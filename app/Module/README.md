This directory is intended for module code. Modules are external packages managed by composer.

Modules are defined as default implementations for base functionality needed for domain code.
Modules should only be dependent on domain code, not application specific code.  

Modules by default should not do anything unless you bind them in your application.