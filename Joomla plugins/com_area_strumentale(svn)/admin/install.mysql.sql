CREATE TABLE IF NOT EXISTS #__as_regioni (
  `id` smallint(6) NOT NULL auto_increment,
  `regione` varchar(100) NOT NULL,

  PRIMARY KEY  (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS #__as_bandi_indiretti (
  `id` int(11) NOT NULL auto_increment,

  `regione` smallint(6) NOT NULL,
  FOREIGN KEY (`regione`)
  REFERENCES  #__as_regioni (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,

  `nome` varchar(500) NOT NULL,
  `scadenza` int(11) NULL default NULL,
  `link` varchar(500) NOT NULL,
  `data_inserimento` date NOT NULL,

  PRIMARY KEY  (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS #__as_settori (
  `id` smallint(6) NOT NULL auto_increment,
  `settore` varchar(255) NOT NULL,

  PRIMARY KEY  (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS #__as_direzioni_generali (
  `id` smallint(6) NOT NULL auto_increment,
  `direzione` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS #__as_programmi (
  `id` smallint(6) NOT NULL auto_increment,
  `programma` varchar(255) NOT NULL,

  `direzione` smallint(6) NOT NULL,
  FOREIGN KEY (`direzione`)
  REFERENCES  #__as_direzioni_generali (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,

  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS #__as_bandi_indiretti_settori (

    `id_bando`
        int(11)     NOT NULL,
    FOREIGN KEY (`id_bando`)
    REFERENCES  #__as_bandi_indiretti (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    `id_settore`
        smallint(6)     NOT NULL,
    FOREIGN KEY (`id_settore`)
    REFERENCES  #__as_settori (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    PRIMARY KEY( `id_bando`,`id_settore` )

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS #__as_bandi_diretti (
  `id` int(11) NOT NULL auto_increment,

  `programma` smallint(6) NOT NULL,
  FOREIGN KEY (`programma`)
  REFERENCES  #__as_programmi (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,

  `nome` varchar(500) NOT NULL,
  `scadenza` int(11) NULL default NULL,
  `link` varchar(500) NOT NULL,
  `data_inserimento` date NOT NULL,

  PRIMARY KEY  (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS #__as_newsletter_iscritti (
  `email` varchar(255) NOT NULL,
  `lastmail` int(11) NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS #__as_newsletter_diretti (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  FOREIGN KEY (`email`)
  REFERENCES  #__as_newsletter_iscritti(email)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  `direzione` smallint(6) default NULL,
      FOREIGN KEY (`direzione`)
    REFERENCES  #__as_direzioni_generali(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  `programma` smallint(6) default NULL,
  
    FOREIGN KEY (`programma`)
  REFERENCES  #__as_programmi(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,


  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS #__as_newsletter_indiretti (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  FOREIGN KEY (`email`)
  REFERENCES  #__as_newsletter_iscritti (`email`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  
  `regione` smallint(6) default NULL,
      FOREIGN KEY (`regione`)
  REFERENCES  #__as_regioni(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  
  `settore` smallint(6) default NULL,
  

    FOREIGN KEY (`settore`)
  REFERENCES  #__as_settori(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
    
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
