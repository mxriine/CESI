#include "AuthPage.h"
#include "CreaPage.h"
#include "StorePage.h"
#include "Client.h"

using namespace System;
using namespace System::Windows::Forms;

void Main(array<String^>^ args) {
    Application::EnableVisualStyles();
    Application::SetCompatibleTextRenderingDefault(false);
    while (true)
    {
        ProjetPOO::auth authForm;
        client^ myClient;
        authForm.ShowDialog();

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