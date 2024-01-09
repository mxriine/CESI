#pragma once

#include <iostream>
#include <string>

using namespace std;

class Header
{

	public:
	Header();
	~Header();

	void setHeader(string header);
	string getHeader();

	private:
	
		string header;
};