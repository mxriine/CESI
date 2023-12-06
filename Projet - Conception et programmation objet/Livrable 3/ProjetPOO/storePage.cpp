#include "storePage.h"
using namespace System;
using namespace System::Windows::Forms;

[STAThreadAttribute]
void Main1(array<String^>^ args) {
    Application::EnableVisualStyles();
    Application::SetCompatibleTextRenderingDefault(false);
    ProjetPOO::storePage form2;
    Application::Run(% form2);
}