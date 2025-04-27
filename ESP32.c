#define BLYNK_TEMPLATE_ID "TMPL3mnp2Rjuv"
#define BLYNK_TEMPLATE_NAME "Smart Plant Monitor"
#define BLYNK_AUTH_TOKEN "3vElg9cskz-Fykb0TzX1yjobLDkTnVM2"

#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <BlynkSimpleEsp32.h>
#include <DHT.h>
#include <freertos/FreeRTOS.h>
#include <freertos/task.h>
#include <freertos/queue.h>
#include <freertos/semphr.h>

// Pin Definitions
#define SOIL_MOISTURE_PIN 36
#define DHTPIN 4
#define DHTTYPE DHT11
#define RELAY_PIN 23
#define BUTTON_PIN 15

char ssid[] = "realme9";
char pass[] = "pass1234";

DHT dht(DHTPIN, DHTTYPE);
LiquidCrystal_I2C lcd(0x27, 16, 2);
BlynkTimer timer;

QueueHandle_t sensorQueue;
SemaphoreHandle_t buttonSemaphore;

bool pumpState = false;

struct SensorData {
  int moisture;
  float temperature;
  float humidity;
};

// ISR for Button
void IRAM_ATTR handleButtonInterrupt() {
  xSemaphoreGiveFromISR(buttonSemaphore, NULL);
}

// Task: Read Sensors
void TaskSensor(void *pvParameters) {
  SensorData data;
  while (1) {
    data.moisture = analogRead(SOIL_MOISTURE_PIN);
    data.moisture = map(data.moisture, 4095, 0, 0, 100);
    data.temperature = dht.readTemperature();
    data.humidity = dht.readHumidity();
    xQueueSend(sensorQueue, &data, portMAX_DELAY);
    vTaskDelay(pdMS_TO_TICKS(2000));
  }
}

// Task: Display and Send to Blynk
void TaskDisplayControl(void *pvParameters) {
  SensorData data;
  while (1) {
    if (xQueueReceive(sensorQueue, &data, portMAX_DELAY)) {
      // Blynk
      Blynk.virtualWrite(V0, data.moisture);
      Blynk.virtualWrite(V1, data.temperature);
      Blynk.virtualWrite(V2, data.humidity);
      Blynk.virtualWrite(V3, pumpState);

      // LCD
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("M:" + String(data.moisture) + "% T:" + String(data.temperature) + "C");
      lcd.setCursor(0, 1);
      lcd.print("H:" + String(data.humidity) + "% P:" + (pumpState ? "ON" : "OFF"));

      // Alerts Only (No Auto Pump Control)
      if (data.moisture < 30) {
        Blynk.logEvent("low_moisture", "Soil moisture is too low!");
      } else if (data.moisture > 80) {
        Blynk.logEvent("high_moisture", "Soil moisture is too high!");
      }

      if (data.temperature > 35) {
        Blynk.logEvent("high_temperature", "Temperature is too high!");
      }
    }
  }
}

// Task: Manual Pump Control (Tactile Button)
void TaskManualPump(void *pvParameters) {
  while (1) {
    if (xSemaphoreTake(buttonSemaphore, portMAX_DELAY)) {
      pumpState = !pumpState;
      digitalWrite(RELAY_PIN, pumpState ? LOW : HIGH);
      Blynk.virtualWrite(V3, pumpState);
    }
  }
}

// Blynk App Control (V3 Switch)
BLYNK_WRITE(V3) {
  pumpState = param.asInt();
  digitalWrite(RELAY_PIN, pumpState ? LOW : HIGH);
}

// Setup
void setup() {
  Serial.begin(115200);

  pinMode(RELAY_PIN, OUTPUT);
  digitalWrite(RELAY_PIN, HIGH);

  pinMode(BUTTON_PIN, INPUT_PULLUP);
  attachInterrupt(BUTTON_PIN, handleButtonInterrupt, FALLING);

  lcd.init();
  lcd.backlight();
  dht.begin();

  Blynk.begin(BLYNK_AUTH_TOKEN, ssid, pass);

  sensorQueue = xQueueCreate(5, sizeof(SensorData));
  buttonSemaphore = xSemaphoreCreateBinary();

  xTaskCreatePinnedToCore(TaskSensor, "Sensor", 2048, NULL, 1, NULL, 1);
  xTaskCreatePinnedToCore(TaskDisplayControl, "DisplayControl", 4096, NULL, 1, NULL, 1);
  xTaskCreatePinnedToCore(TaskManualPump, "ManualPump", 2048, NULL, 1, NULL, 1);
}

// Loop
void loop() {
  Blynk.run();
}