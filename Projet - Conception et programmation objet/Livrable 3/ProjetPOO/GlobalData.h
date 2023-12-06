#pragma once

#include "client.h"

public ref class GlobalData
{
public:
    static client^ myClient = gcnew client();

    static client^ GetMyClient()
    {
        return myClient;
    }

    static void SetMyClient(client^ newClient)
    {
        myClient = newClient;
    }
};