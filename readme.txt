Il lavoro è stato svolto usando come strumenti xampp con la configurazione dei servizi apache (sulla porta 8080) e MySQL 
(sulla porta 3306).
L'esercizio non è stato svolto in tutta la sua interezza: mi sono concentrato principalmente sulla parte dell'admin realizzando
le 3 pagine richieste (Pagina Utenti, Pagina Servizi/Prodotti e Pagina Ordini) oltre il form per il login e la registrazione
(a cui ha accesso solo l'admin), mentre per "l'area clienti" ho realizzato la dashboard con la possibilità di aggiungere
uno o più servizi/prodotti a un carrello (la parte dell'area clienti non è stata completata nella sua interezza ma sono state
realizzate solo le funzioni essenziali).
Per accedere all'area clienti c'è un pulsante nell'index.php, in quanto non sono riuscito a gestire i permessi di accesso alle
diverse pagine per mancanza di tempo, quindi chiunque può accedere a tutto, però ho voluto almeno differenziare il modo in cui
accedere alle due sezioni in modo tale da far comprendere che effettivamente sono separate.

Sono stati creati due utenti:
nicola03.lunardelli@gmail.com con password pippo
pippo@pippo.com con password pippo 
(specifico le password in quanto nella rispettiva tabella utenti nel db sono criptate)