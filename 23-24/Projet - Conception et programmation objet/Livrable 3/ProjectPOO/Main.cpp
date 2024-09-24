#include "AuthPage.h"
#include "CreaPage.h"
#include "StorePage.h"
#include "Client.h"

using namespace System;
using namespace System::Windows::Forms;


[STAThreadAttribute]
//void Main(array<String^>^ args) {
void Main() {
    Application::EnableVisualStyles();
    Application::SetCompatibleTextRenderingDefault(false);
    bool a = true;
    while (a == true)
    {
        ProjetPOO::auth authForm;
        client^ myClient;
        authForm.ShowDialog();

        if (authForm.switchToQuit == true)
        {
            a = false;
        }
        if (authForm.switchToCreate == true)
        {
            ProjetPOO::creationPage creationPage;
            creationPage.ShowDialog();
        }
        if (authForm.switchToStore == true)
        {
            ProjetPOO::storePage storePage;
            storePage.ShowDialog();
        }
    }
}