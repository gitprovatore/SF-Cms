## SF-CmS ##

SF-CmS è un piccolo cms che ho progettato per il mio sito, all inizio non avevo publicato i sorgenti e non avevo intenzione di aggiungere altre funzioni o di continuare a svilupparlo ma poi ho cambiato idea :).

**SF-CmS non è un cms per grandi siti ma un cms piccolo, semplice, facilmente aggiornabile, e soprattutto flat, proprio come lo volevo io.**

Le caratteristiche di SF-CmS sono:

- Possibilità di inserire e modificare articoli.
- Possibilità di inserire e modificare pagine.
- Possibilità di modificare il menu.
- Possibilità di la home page.

## Installazione e Configurazione: ##

- Come prima cosa aprite il file config.php e configuratelo seguendo le istruzione dei commenti.
- Caricate tutti i file di SF-CmS nel vostro spazio web.
- Fate il chmod di tutti i file a 777.
- Aprite il file install.php e inserite username, password e la conferma della password.
- Eliminate il file install.php
- Fate il chmod dei file config.php e loginconfig.php a 664.
- Andate nel pannello admin che si trova nella cartella root, quindi www.vostrosito.it/root/ e potete cominciare a modificare la home page e a scrivere articoli e inserire pagine.

## Informazioni sul funzionamento del menu ##

Il menu è scritto sul file ./database/liste/menuSito.json e contiene i link alle pagine che avete creato però se voi volete aggiungere un link ad una pagina o ad un sito potete farlo basta scrivere il link così:

`[{"link":"http:/link già presente.it/", "nome":"un link già nel menu"}, {"link":"http:/link.it/", "nome":"link al sito link.it"}]`  

Non dimenticate http, https etc.. perche se li dimenticate il link verrà visto come un id di una pagina.  
E ricordate sempre di separare con una virgola gli elementi tra le parentesi graffe e quadre :).  

Per modificare l' aspetto del cms dovete modificare i file:

- style/theme.php
- style/style.css

Essendo scarso nelle css usato le css di minilol il cms di meh, spero che non si arrabbi xD.
