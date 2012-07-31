+--------------------------------------------------------+
| Tipo: ...... Panello
| Nome: ...... Online Users Ajax Panel
| Versione: .. 1.01
| Autore: .... Valerio Vendrame (lelebart)
| Co-Autore: . Giovanni Toraldo (scorp)
| Rilasciato: . 29 Gen 2011
| Download: .. http://www.php-fusion.it
+--------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+

	/************************************************\
	
		Indice
		- Descrizione
		- Installazione
		- Utilizzo
		- Caratteristiche
		- Autori
        - Storico
		- Distribuzioni Future
		- Note per gli Sviluppatori
		
	\************************************************/

+-------------+
| DESCRIZIONE |
+-------------+

Questo pannello mostra, in TEMPO REALE:
 - quanti utenti sono registrati,
 - nuovi utenti da attivare se presenti,
 - l'ultimo iscritto,
 - quanti ospiti ci sono online (e il loro indirizzo IP agli amminitratori che hanno il permesso per la blacklist),
 - quali utenti sono online o sono appena andati via, e da quanto tempo.

+---------------+
| INSTALLAZIONE |
+---------------+

1. Caricare la cartella 'online_users_ajax_panel' nella cartella 'infusions' del server;
2. Andare in Amministrazione > Sistema -> Pannelli;
3. Premere "Agiungi un nuovo pannello": 
 3.1. dare un titolo significativo,
 3.2. selecionare dal menu a tendina 'online_users_ajax_panel',
 3.3. impostare la visibilità,
 3.4. digitare la propria password di amministrazione e
 3.5. premere "Salva";
4. Impostare l'ordine del pannello laterale appena creato.


+----------+
| UTILIZZO |
+----------+

Aprire 'online_users_ajax_panel.php' con il proprio editor preferito (leggi le "Note per gli Sviluppatori"), quindi impostare le preferenze:

//settings
//$root_style  = "FF0000"; //hex only without #
//$admin_style = "00CC00"; //hex only without #

Da qui è possibile impostare il colore per i superamministratori e per gli amminitratori, se non utilizzato o rimosso, il foglio di stile php-css impostaerà automaticamente i valori di default.
Caricare/Sovrascrivere il file remoto se necessario.

Aprire 'online_users_ajax_data.php' con il proprio editor preferito (leggi le "Note per gli Sviluppatori"), quindi impostare le preferenze:

//settings
$limit = 10;

Da qui è possibile impostare il numero massimo di iscritti da visualizzare:
bisogna considerare che, se il numero degli iscritti online supera quel valore, quest'ultimo sarà incrementato dal numero di iscritti online
esempio: limite = 10, ma online = 13, allora limite = (13+10)=23
Caricare/Sovrascrivere il file remoto se necessario.
	
	
+-----------------+
| CARATTERISTICHE |
+-----------------+

- si aggiorna ogni 5 secondi grazie al plugin heartbeat per jQuery
- molto personalizzabile - anche tramite css
- mostra gli indirizzi IP degli ospiti agli amminitratori
+ Compatibile con:
  - PHP-Fusion 7.00.xx
  - PHP-Fusion 7.01.xx

  
+--------+
| AUTORI |
+--------+

 nome - sito web ........................................... |  0.00 |  1.00 |  1.01
-------------------------------------------------------------+-------+-------+-------
 Valerio Vendrame (lelebart) - http://www.valeriovendrame.it |   *   |   *   |   *  
-------------------------------------------------------------+-------+-------+-------
 Giovanni Toraldo (scorp) - http://www.scorpionworld.it      |       |   *   |     

 
+---------+
| STORICO |
+---------+

+ 1.01 (29 Gen 2011)
 - ADMIN fix da lelebart

+ 1.00 (9 Feb 2010)
 - Prima distribuzione pubblica
 - THEMEBULLET fix da scorp

+ 0.00 (23 Gen 2009)
 - Idea, aggiunta del plugin per jQuery, regole di stile.. le cose principali


+----------------------+
| DISTRIBUZIONI FUTURE |
+----------------------+

+ 1.02 - n/d
 - Pagina amministrativa per le impostazioni (infusion)
 
 
+---------------------------+
| NOTE per gli SVILUPPATORI |
+---------------------------+

1. Divertitevi ;)
2. Per i soli utenti di Micorsoft Windows: Notepad++ regna! - http://notepad-plus.sourceforge.net/