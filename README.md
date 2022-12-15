
# ViajesParaTi Proveïdors

![](https://i.imgur.com/PQJES1j.png)

### ✨  Aplicació
* Dades a emmagatzemar:
    - Nom
    - Correu electrònic
    - Telèfon de contacte
    - Tipus de proveïdor (Hotel, Pista o Complement)
    - Activitat
    
### ⚙️ Deploy

``` bash
# Instal·lar dependències
composer install

# Editar el fitxer env i afegir els paràmetres DB

# Creació Proveidors schema
php bin/console doctrine:migrations:diff

# Executar migracions
php bin/console doctrine:migrations:migrate

# Run symfony server 
symfony server:start

```

### 👨🏼‍💻 Autor
Adrià Milan Moreno

### 🛫 Informació
- [VIAJES PARA TI](https://viajesparati.com/)
