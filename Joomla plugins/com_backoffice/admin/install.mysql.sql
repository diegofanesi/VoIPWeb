CREATE TABLE IF NOT EXISTS #__bko_Utenti (
    `utente_username`
        varchar(40)     NOT NULL,
    `utente_password`
        varchar(40)     NOT NULL,
    `utente_id`
        int(4)          NOT NULL,
    `utente_codice`
        int(4)          NOT NULL,
    `utente_tipo`
        varchar(8)      NOT NULL,
    `utente_credito`
        int(11)         NOT NULL DEFAULT 0,

    UNIQUE (`utente_id`),

    PRIMARY KEY ( `utente_username` )

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_Consulenze (
    `consulenza_tipo`
        varchar(20)     NOT NULL,
    `consulenza_prezzo` 
        int(11)         NOT NULL,

    `consulenza_gruppo`
        int(10)         NOT NULL,

    PRIMARY KEY (`consulenza_tipo`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_Orario (
    `orario_giorno`
        int(1)          NOT NULL,
    `orario_inizio`
        TIME            NOT NULL,
    `orario_fine`
        TIME            NOT NULL,
    `utente_username`
        varchar(40)     NOT NULL,
    FOREIGN KEY ( `utente_username` )
    REFERENCES #__bko_Utenti ( `utente_username` )
    ON DELETE CASCADE
    ON UPDATE CASCADE

) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS #__bko_Orari_Alternativi (
    `orario_alternativo_data`
        DATE            NOT NULL,
    `orario_alternativo_inizio`
        TIME,
    `orario_alternativo_fine`
        TIME,
    `utente_username`
        varchar(40)     NOT NULL,
    FOREIGN KEY ( `utente_username` )
    REFERENCES  #__bko_Utenti ( `utente_username` )
    ON DELETE CASCADE
    ON UPDATE CASCADE

) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS #__bko_Prenotazioni (
    `prenotazione_data`
        DATE            NOT NULL,
    `prenotazione_inizio`
        TIME            NOT NULL,
    `prenotazione_fine`
        TIME            NOT NULL,

    `consulenza_tipo`
        varchar(20)     NOT NULL,
    FOREIGN KEY ( `consulenza_tipo` )
    REFERENCES  #__bko_Consulenze ( `consulenza_tipo` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,

    `utente_username`
        varchar(40)     NOT NULL,
    FOREIGN KEY ( `utente_username` )
    REFERENCES  #__bko_Utenti ( `utente_username` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    `consulente_username`
        varchar(40),
    FOREIGN KEY ( `utente_username` )
    REFERENCES  #__bko_Utenti ( `utente_username` )
    ON DELETE CASCADE
    ON UPDATE CASCADE

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_Movimenti (
    `movimento_data`
        TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `movimento_quantita`
        int(11)         NOT NULL,
    `movimento_tipo`
        varchar(20)     NOT NULL,

    `utente_username`
        varchar(40)     NOT NULL,
    FOREIGN KEY ( `utente_username` )
    REFERENCES  #__bko_Utenti ( `utente_username` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    `consulenza_tipo`
        varchar(40)     NOT NULL,
    FOREIGN KEY ( `consulenza_tipo` )
    REFERENCES  #__bko_Consulenze ( `consulenza_tipo` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,

    INDEX ( `utente_username` )

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_cdr ( 
    `calldate`
        datetime        NOT NULL DEFAULT '0000-00-00 00:00:00', 
    `clid`
        varchar(80)     NOT NULL DEFAULT '', 
    `src`
        varchar(80)     NOT NULL DEFAULT '', 
    `dst`
        varchar(80)     NOT NULL DEFAULT '', 
    `dcontext`
        varchar(80)     NOT NULL DEFAULT '',  
    `channel`
        varchar(80)     NOT NULL DEFAULT '', 
    `dstchannel`
        varchar(80)     NOT NULL DEFAULT '', 
    `lastapp`
        varchar(80)     NOT NULL DEFAULT '', 
    `lastdata`
        varchar(80)     NOT NULL DEFAULT '', 
    `duration`
        int(11)         NOT NULL DEFAULT '0', 
    `billsec`
        int(11)         NOT NULL DEFAULT '0', 
    `disposition`
        varchar(45)     NOT NULL DEFAULT '',  
    `amaflags`
        int(11)         NOT NULL DEFAULT '0', 
    `accountcode`
        varchar(40)     NOT NULL DEFAULT '', 
    `userfield`
        varchar(255)    NOT NULL DEFAULT '', 
    `uniqueid`
        varchar(32)     NOT NULL DEFAULT '',
    
    INDEX ( `calldate` ),
    INDEX ( `dst` ),
    INDEX ( `accountcode` )
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_extensions_table ( 
    `id`
        int(11)         NOT NULL AUTO_INCREMENT, 
    `context`
        varchar(20)     NOT NULL DEFAULT '', 
    `exten`
        varchar(20)     NOT NULL DEFAULT '', 
    `priority`
        int(4)          NOT NULL DEFAULT 0,
    `app`
        varchar(20)     NOT NULL DEFAULT '', 
    `appdata`
        varchar(128)    NOT NULL DEFAULT '', 
    PRIMARY KEY  (`context`,`exten`,`priority`), 
    KEY `id` (`id`) 
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__bko_Calendar (
    `Data`
        DATE            NOT NULL,
    `Inizio`
        TIME            NOT NULL,
    `Fine`
        TIME            NOT NULL,
    `Consulente`
        varchar(40)     NOT NULL,
    FOREIGN KEY (`Consulente`)
    REFERENCES  #__bko_Utenti (`utente_username`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    INDEX( `Data` )

) ENGINE=InnoDB;

DROP VIEW IF EXISTS asterisk_view;
DROP VIEW IF EXISTS #__bko_Iax;

CREATE VIEW #__bko_Iax AS
    SELECT utente_username as username,
           utente_username as name,
           utente_password as secret,
           'consulente' as context,
           'dynamic' as host,
           0 as port,
           0 as ipaddr,
           0 as regseconds
                FROM #__bko_Utenti
                    WHERE utente_username IN (
                        SELECT utente_username
                            FROM #__bko_Utenti, #__bko_Consulenze, #__user_usergroup_map
                                WHERE `utente_id` = `user_id` AND `consulenza_gruppo` = `group_id`)
    UNION
    SELECT utente_username as username,
           utente_username as name,
           utente_password as secret,
           'utente' as context,
           'dynamic' as host,
           0 as port,
           0 as ipaddr,
           0 as regseconds
                FROM #__bko_Utenti
                    WHERE utente_username NOT IN (
                        SELECT utente_username
                            FROM #__bko_Utenti, #__bko_Consulenze, #__user_usergroup_map
                                WHERE `utente_id` = `user_id` AND `consulenza_gruppo` = `group_id`);

