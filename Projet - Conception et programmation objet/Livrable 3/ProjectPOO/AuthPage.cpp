#include "AuthPage.h"

using namespace System;
using namespace System::Windows::Forms;

[STAThreadAttribute]
void Main0(array<String^>^ args) {
    Application::EnableVisualStyles();
    Application::SetCompatibleTextRenderingDefault(false);
    ProjetPOO::auth form;
    Application::Run(% form);
}