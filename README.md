Factura Electrónica AFIP
========================

Permite crear facturas electrónicas usando los Servicios Web de AFIP. Construido usando 
el framework Symfony MVC de php.  

Importante
--------------

Se encuentra en un estado alpha, con pocas características y muchos inconvenientes y fallas de seguridad. 
No lo use en modo producción. Solo para homologación por el momento. 


Actualmente soporta:
----------------------------
  * Factura electrónica de Monotributo; 

  * Soporte a facturas de servicios;

  * Imprimir Factura genérica con CAE;

  * Listado de facturas emitidas;

  * Listado de Clientes;  

Antes de utilizarlo se necesita:
------------------------------------------
  * Realizar todos los pasos necesarios para emitir factura electrónica establecidos por la AFIP.

  * Cargar en el directorio: src/AppBundle/Certs, los certificados.

  * Clave y el CUIT en ficheros src/AppBundle/Certs.   

  * Configurar Emisor.



Nombres de ficheros:
----------------------------

  * src/AppBundle/AFIP.cert;
  * src/AppBundle/certificado.pfx;
  * src/AppBundle/cuit.txt;
  * src/AppBundle/MiClavePrivada;
  * src/AppBundle/pass.txt;
  * src/AppBundle/wssa.wsdl;

# factura-electronica-afip
