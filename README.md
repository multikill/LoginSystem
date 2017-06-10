# LoginSystem [UPDATED]
```css
   Some information, i will not upload the VB Code, update it yourself. I dont want that people skid my Code and dont give any Credits.
```
VB.NET LoginSystem with PHP API

A Project by astron-dev and LMXGN.

## Features:
- HWID Lock
- Server Check
- Random Login Token
- Clientside Encryption

### Todo:
- [x] Encrypt the passwords
- [x] Random Token for each Login
- [x] Switch to MySQLi or PDO (In the next Update)
- [ ] Last Login + Last IP
- [ ] WebPanel (In the next Update)

##### How to make a Request:

Register Request:
http://yourdomain.net/API/Register.php?username=Username&email=Email&hwid=HWID-Hash&password=EncryptedPW

Login Request:
http://yourdomain.net/API/Login.php?username=Username&password=EncryptedPW&hwid=HWID-Hash&token=UnsignedRandomToken

