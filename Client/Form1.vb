Imports System.Security.Cryptography
Imports System.Text

Public Class Form1

    'ENTERED INFORMATION
    Dim enteredemail As String
    Dim entereduser As String
    Dim enteredpw As String
    Dim ctoken As String

    Private Sub login_btn_login_Click(sender As Object, e As EventArgs) Handles login_btn_login.Click
        'Security Token Generator
        Dim pool As String = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
        Dim count = 0
        Dim rnd As New Random
        Dim strpos = ""
        Dim rndtoken = ""
        While count <= 16
            strpos = rnd.Next(0, pool.Length)
            count = count + 1
        End While
        rndtoken = pool(strpos)

        'MD5 Generator for SecurityToken
        Dim md5 As New System.Security.Cryptography.MD5CryptoServiceProvider
        Dim bytes() As Byte = md5.ComputeHash(System.Text.Encoding.ASCII.GetBytes(rndtoken))
        Dim s As String = ""
        For Each i As Byte In bytes
            s &= i.ToString("x2")
        Next
        ctoken = s

        'Web Request
        entereduser = login_txt_user.Text
        enteredpw = login_txt_password.Text
        Dim webbrowser1 As New WebBrowser
        webbrowser1.Navigate("http://localhost/LoginSystem/login.php?username=" & entereduser & "&password=" & Encrypt(enteredpw, "This is Keys") & "&hwid=" & Encrypt(GetHWID, "This is Keys") & "&token=" & rndtoken)
        'http://localhost/loginsystem/login.php?username=test&password=test&hwid=test

        Do While webbrowser1.ReadyState <> WebBrowserReadyState.Complete
            Application.DoEvents()
        Loop
        If webbrowser1.DocumentText.Contains("wronghwid") Then
            MsgBox("This PC is not authorized, Account banned.", MsgBoxStyle.Critical, "AntiPiracy")
        End If

        If webbrowser1.DocumentText.Contains(ctoken) Then
            MessageBox.Show("Successfully logged in.")
            'Form2.Show()
        Else
            MessageBox.Show("The entered login details are invalid, please try again!")
        End If
    End Sub

    Private Sub register_btn_register_Click(sender As Object, e As EventArgs) Handles register_btn_register.Click
        enteredemail = register_txt_email.Text
        entereduser = register_txt_user.Text
        enteredpw = register_txt_password.Text
        Dim webbrowser1 As New WebBrowser
        webbrowser1.Navigate("http://localhost/LoginSystem/register.php?email=" & enteredemail & "&username=" & entereduser & "&password=" & Encrypt(enteredpw, "This is Keys") & "&hwid=" & Encrypt(GetHWID(), "This is Keys"))
        //http://localhost/loginsystem/register.php?email=test2&username=test2&password=test2&hwid=test2

        Do While webbrowser1.ReadyState <> WebBrowserReadyState.Complete
            Application.DoEvents()
        Loop
        If webbrowser1.DocumentText.Contains("1") Then
            MessageBox.Show("Diese E-Mail und/oder der Benutzername existiert bereits in unserer Datenbank!", "E-Mail/Benutzername existiert bereits", MessageBoxButtons.OK, MessageBoxIcon.Error)
        ElseIf webbrowser1.DocumentText.Contains("FINISHED") Then
            MessageBox.Show("Benutzer erfolgreich registriert, Sie können sich nun Anmelden", "Registrierung erfolgreich", MessageBoxButtons.OK, MessageBoxIcon.Information)
        End If
    End Sub


        'HWID Getter
    Function GetHWID()
        Dim HWID As String = System.Security.Principal.WindowsIdentity.GetCurrent.User.Value
        Return HWID
    End Function


   'CryptoSystem by QuiteCode (DO NOT CHANGE)
    Dim DES As New TripleDESCryptoServiceProvider
    Dim MD5 As New MD5CryptoServiceProvider

    'hash function
    Function MD5Hash(value As String) As Byte()
        Return MD5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(value))
    End Function

    'Encryption
    Function Encrypt(input As String, Key As String) As String

        DES.Key = MD5Hash(Key)
        DES.Mode = CipherMode.ECB

        Dim buffer As Byte() = ASCIIEncoding.ASCII.GetBytes(input)

        Return Convert.ToBase64String(DES.CreateEncryptor().TransformFinalBlock(buffer, 0, buffer.Length))


    End Function

    Function Decrypt(encryptedstring As String, Key As String) As String

        DES.Key = MD5Hash(Key)
        DES.Mode = CipherMode.ECB

        Dim buffer As Byte() = Convert.FromBase64String(encryptedstring)
        Return ASCIIEncoding.ASCII.GetString(DES.CreateDecryptor().TransformFinalBlock(buffer, 0, buffer.Length))

    End Function

End Class
