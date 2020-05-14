/****************************For http client****************/
#include <Arduino.h>
#include <WiFi.h>
#include <WiFiMulti.h>
#include <HTTPClient.h>
#define USE_SERIAL Serial
WiFiMulti wifiMulti;
String url="https://nishanchettri.com/hackster01/specific.php?pid=" ;
/***********************************************************/
/****************************For MFRC522****************/
#include <SPI.h>
#include <MFRC522.h>
#include <String.h>

#define RST_PIN         22        // Configurable, see typical pin layout above
#define SS_PIN          21        // Configurable, see typical pin layout above
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
/***********************************************************/
String med;
void setup() {

    USE_SERIAL.begin(9600);
    SPI.begin();      // Initiate  SPI bus
    mfrc522.PCD_Init();   // Initiate MFRC522
    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();

    wifiMulti.addAP("nissan", "password");
    while((wifiMulti.run() != WL_CONNECTED))
    {
      delay(500);
      Serial.print(".");
    }
    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
}

void loop() 
{

  String content= "";
  byte letter;
     while((wifiMulti.run() != WL_CONNECTED));

      if ( ! mfrc522.PICC_IsNewCardPresent()) 
        {
          return;
        }
        // Select one of the cards
      if ( ! mfrc522.PICC_ReadCardSerial()) 
        {
          return;
        }
      for (byte i = 0; i < mfrc522.uid.size; i++) 
          {
             content.concat(String(mfrc522.uid.uidByte[i]));
          }
          
        HTTPClient http;
        url+=content;
        http.begin(url); //HTTP
        int httpCode = http.GET();
        
        if(httpCode > 0) 
        {
            if(httpCode == HTTP_CODE_OK) 
            {
               med = http.getString();
               Serial.println(med);
            }
        } 
        else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();

    delay(5000);

}
