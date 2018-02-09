<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Das Formular überschreibt den Löschvorgang, um die Komponentenliste zu bereinigen.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Wird vom Windows Form-Designer benötigt.
    Private components As System.ComponentModel.IContainer

    'Hinweis: Die folgende Prozedur ist für den Windows Form-Designer erforderlich.
    'Das Bearbeiten ist mit dem Windows Form-Designer möglich.  
    'Das Bearbeiten mit dem Code-Editor ist nicht möglich.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.TabControl1 = New System.Windows.Forms.TabControl()
        Me.Tab_Login = New System.Windows.Forms.TabPage()
        Me.Tab_Register = New System.Windows.Forms.TabPage()
        Me.login_lbl_user = New System.Windows.Forms.Label()
        Me.login_lbl_password = New System.Windows.Forms.Label()
        Me.login_txt_user = New System.Windows.Forms.TextBox()
        Me.login_txt_password = New System.Windows.Forms.TextBox()
        Me.login_btn_login = New System.Windows.Forms.Button()
        Me.register_lbl_user = New System.Windows.Forms.Label()
        Me.register_lbl_email = New System.Windows.Forms.Label()
        Me.register_lbl_password = New System.Windows.Forms.Label()
        Me.register_txt_user = New System.Windows.Forms.TextBox()
        Me.register_txt_email = New System.Windows.Forms.TextBox()
        Me.register_txt_password = New System.Windows.Forms.TextBox()
        Me.register_btn_register = New System.Windows.Forms.Button()
        Me.lbl_status = New System.Windows.Forms.Label()
        Me.TabControl1.SuspendLayout
        Me.Tab_Login.SuspendLayout
        Me.Tab_Register.SuspendLayout
        Me.SuspendLayout
        '
        'TabControl1
        '
        Me.TabControl1.Controls.Add(Me.Tab_Login)
        Me.TabControl1.Controls.Add(Me.Tab_Register)
        Me.TabControl1.Location = New System.Drawing.Point(0, 0)
        Me.TabControl1.Name = "TabControl1"
        Me.TabControl1.SelectedIndex = 0
        Me.TabControl1.Size = New System.Drawing.Size(270, 191)
        Me.TabControl1.TabIndex = 0
        '
        'Tab_Login
        '
        Me.Tab_Login.Controls.Add(Me.login_btn_login)
        Me.Tab_Login.Controls.Add(Me.login_txt_password)
        Me.Tab_Login.Controls.Add(Me.login_txt_user)
        Me.Tab_Login.Controls.Add(Me.login_lbl_password)
        Me.Tab_Login.Controls.Add(Me.login_lbl_user)
        Me.Tab_Login.Location = New System.Drawing.Point(4, 25)
        Me.Tab_Login.Name = "Tab_Login"
        Me.Tab_Login.Padding = New System.Windows.Forms.Padding(3)
        Me.Tab_Login.Size = New System.Drawing.Size(262, 162)
        Me.Tab_Login.TabIndex = 0
        Me.Tab_Login.Text = "Login"
        Me.Tab_Login.UseVisualStyleBackColor = true
        '
        'Tab_Register
        '
        Me.Tab_Register.Controls.Add(Me.register_btn_register)
        Me.Tab_Register.Controls.Add(Me.register_txt_password)
        Me.Tab_Register.Controls.Add(Me.register_txt_email)
        Me.Tab_Register.Controls.Add(Me.register_txt_user)
        Me.Tab_Register.Controls.Add(Me.register_lbl_password)
        Me.Tab_Register.Controls.Add(Me.register_lbl_email)
        Me.Tab_Register.Controls.Add(Me.register_lbl_user)
        Me.Tab_Register.Location = New System.Drawing.Point(4, 25)
        Me.Tab_Register.Name = "Tab_Register"
        Me.Tab_Register.Padding = New System.Windows.Forms.Padding(3)
        Me.Tab_Register.Size = New System.Drawing.Size(262, 162)
        Me.Tab_Register.TabIndex = 1
        Me.Tab_Register.Text = "Register"
        Me.Tab_Register.UseVisualStyleBackColor = true
        '
        'login_lbl_user
        '
        Me.login_lbl_user.AutoSize = true
        Me.login_lbl_user.Location = New System.Drawing.Point(8, 9)
        Me.login_lbl_user.Name = "login_lbl_user"
        Me.login_lbl_user.Size = New System.Drawing.Size(38, 17)
        Me.login_lbl_user.TabIndex = 0
        Me.login_lbl_user.Text = "User"
        '
        'login_lbl_password
        '
        Me.login_lbl_password.AutoSize = true
        Me.login_lbl_password.Location = New System.Drawing.Point(8, 34)
        Me.login_lbl_password.Name = "login_lbl_password"
        Me.login_lbl_password.Size = New System.Drawing.Size(69, 17)
        Me.login_lbl_password.TabIndex = 1
        Me.login_lbl_password.Text = "Password"
        '
        'login_txt_user
        '
        Me.login_txt_user.Location = New System.Drawing.Point(123, 6)
        Me.login_txt_user.Name = "login_txt_user"
        Me.login_txt_user.Size = New System.Drawing.Size(100, 22)
        Me.login_txt_user.TabIndex = 2
        '
        'login_txt_password
        '
        Me.login_txt_password.Location = New System.Drawing.Point(123, 46)
        Me.login_txt_password.Name = "login_txt_password"
        Me.login_txt_password.Size = New System.Drawing.Size(100, 22)
        Me.login_txt_password.TabIndex = 3
        '
        'login_btn_login
        '
        Me.login_btn_login.Location = New System.Drawing.Point(148, 91)
        Me.login_btn_login.Name = "login_btn_login"
        Me.login_btn_login.Size = New System.Drawing.Size(75, 23)
        Me.login_btn_login.TabIndex = 4
        Me.login_btn_login.Text = "Login"
        Me.login_btn_login.UseVisualStyleBackColor = true
        '
        'register_lbl_user
        '
        Me.register_lbl_user.AutoSize = true
        Me.register_lbl_user.Location = New System.Drawing.Point(19, 6)
        Me.register_lbl_user.Name = "register_lbl_user"
        Me.register_lbl_user.Size = New System.Drawing.Size(38, 17)
        Me.register_lbl_user.TabIndex = 0
        Me.register_lbl_user.Text = "User"
        '
        'register_lbl_email
        '
        Me.register_lbl_email.AutoSize = true
        Me.register_lbl_email.Location = New System.Drawing.Point(19, 32)
        Me.register_lbl_email.Name = "register_lbl_email"
        Me.register_lbl_email.Size = New System.Drawing.Size(42, 17)
        Me.register_lbl_email.TabIndex = 1
        Me.register_lbl_email.Text = "Email"
        '
        'register_lbl_password
        '
        Me.register_lbl_password.AutoSize = true
        Me.register_lbl_password.Location = New System.Drawing.Point(19, 60)
        Me.register_lbl_password.Name = "register_lbl_password"
        Me.register_lbl_password.Size = New System.Drawing.Size(69, 17)
        Me.register_lbl_password.TabIndex = 2
        Me.register_lbl_password.Text = "Password"
        '
        'register_txt_user
        '
        Me.register_txt_user.Location = New System.Drawing.Point(119, 3)
        Me.register_txt_user.Name = "register_txt_user"
        Me.register_txt_user.Size = New System.Drawing.Size(100, 22)
        Me.register_txt_user.TabIndex = 3
        '
        'register_txt_email
        '
        Me.register_txt_email.Location = New System.Drawing.Point(119, 32)
        Me.register_txt_email.Name = "register_txt_email"
        Me.register_txt_email.Size = New System.Drawing.Size(100, 22)
        Me.register_txt_email.TabIndex = 4
        '
        'register_txt_password
        '
        Me.register_txt_password.Location = New System.Drawing.Point(119, 60)
        Me.register_txt_password.Name = "register_txt_password"
        Me.register_txt_password.Size = New System.Drawing.Size(100, 22)
        Me.register_txt_password.TabIndex = 5
        '
        'register_btn_register
        '
        Me.register_btn_register.Location = New System.Drawing.Point(144, 116)
        Me.register_btn_register.Name = "register_btn_register"
        Me.register_btn_register.Size = New System.Drawing.Size(75, 23)
        Me.register_btn_register.TabIndex = 6
        Me.register_btn_register.Text = "Register"
        Me.register_btn_register.UseVisualStyleBackColor = true
        '
        'lbl_status
        '
        Me.lbl_status.AutoSize = true
        Me.lbl_status.Location = New System.Drawing.Point(13, 218)
        Me.lbl_status.Name = "lbl_status"
        Me.lbl_status.Size = New System.Drawing.Size(52, 17)
        Me.lbl_status.TabIndex = 1
        Me.lbl_status.Text = "Status:"
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(8!, 16!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(275, 247)
        Me.Controls.Add(Me.lbl_status)
        Me.Controls.Add(Me.TabControl1)
        Me.Name = "Form1"
        Me.Text = "Mogelmodul Loader"
        Me.TabControl1.ResumeLayout(false)
        Me.Tab_Login.ResumeLayout(false)
        Me.Tab_Login.PerformLayout
        Me.Tab_Register.ResumeLayout(false)
        Me.Tab_Register.PerformLayout
        Me.ResumeLayout(false)
        Me.PerformLayout

End Sub

    Friend WithEvents TabControl1 As TabControl
    Friend WithEvents Tab_Login As TabPage
    Friend WithEvents Tab_Register As TabPage
    Friend WithEvents login_btn_login As Button
    Friend WithEvents login_txt_password As TextBox
    Friend WithEvents login_txt_user As TextBox
    Friend WithEvents login_lbl_password As Label
    Friend WithEvents login_lbl_user As Label
    Friend WithEvents register_btn_register As Button
    Friend WithEvents register_txt_password As TextBox
    Friend WithEvents register_txt_email As TextBox
    Friend WithEvents register_txt_user As TextBox
    Friend WithEvents register_lbl_password As Label
    Friend WithEvents register_lbl_email As Label
    Friend WithEvents register_lbl_user As Label
    Friend WithEvents lbl_status As Label
End Class
