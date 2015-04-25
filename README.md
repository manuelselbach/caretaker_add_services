# TYPO3 Extension "caretaker_add_services"

This extension extends the extension caretaker_instance with additional services.

Currently added services:

* A service to clear cache on a remote instance (needs extension "coreapi" to be installed) to have the abbility to delete the cache of multiple TYPO3 installations at the same time from a single place.


# Installation and configuration

First of all you need a working caretaker server and one or more connected TYPO3 instance/s.

If available, just install the extension on the typically way on the servers (caretaker server and the remote TYPO3 installation/s).

After it´s installed, go to the caretaker backend module of the caretaker and create a new test for the instance where to delete the cache.

Select from the "Test Service" list: TYPO3 -> Clear cache

Now select which type of cache you would like to clear under "Test Configuration".

Thats all, hope you enjoy it!

  
### Feel free to implement more services!

  
  
  

Dependencies:

For the caretaker server:

* coreapi
* caretaker
* caretaker_instance


For the remote server:

* coreapi
* caretaker_instance


# Thanks

Many thanks to the guys who implemented the caretaker extension!

[caretaker project](http://www.typo3-caretaker.org)
