#include "Header.h"

Header::Header()
{
	cout << "Header constructor called" << endl;
}

Header::~Header()
{
	cout << "Header destructor called" << endl;
}

void Header::setHeader(string header)
{
	this->header = header;
}

string Header::getHeader()
{
	return header;
}

int main()
{
	Header header;
	header.setHeader("Hello World!");
	cout << header.getHeader() << endl;
	return 0;
}