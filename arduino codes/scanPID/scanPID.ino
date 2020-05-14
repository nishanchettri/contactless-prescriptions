#include <SPI.h>
#include <MFRC522.h>
#include <String.h>

#define RST_PIN         22        // Configurable, see typical pin layout above
#define SS_PIN          21        // Configurable, see typical pin layout above

MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
 
void setup() 
{
  
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  Serial.println("Approximate your card to the reader...");
  Serial.println();

}
void loop() 
{
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     content.concat(String(mfrc522.uid.uidByte[i]));
  }
// char* c = strcpy(new char[content.length() + 1], content.c_str());
Serial.print("t1.txt=\"" + content+ "\"");
Serial.write(0xff);
Serial.write(0xff);
Serial.write(0xff);
delay(500);

} 
