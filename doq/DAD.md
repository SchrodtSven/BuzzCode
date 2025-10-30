# Design & Architecture Dossier

## Conventions

In this small project I will use:

- short (internal) member names for attributes (ex. ```$cnt``` instad of ```$content```)
- signatures with optional ```$inpl``` (inplace) boolean flag, deciding if new instance will be returned or a new one [see](src/Type/Lst.php)
- public attributes with property hookz, whenever conveniant
- self defined Data Types for an OOP-fluent interface access

### Types

- ```raw()```method returning internal (actual) data type