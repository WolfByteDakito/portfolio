-- =====================================================================
-- Base de données du portfolio (OPTIONNELLE)
-- À importer via phpMyAdmin si tu veux gérer les projets/contacts en BDD
-- =====================================================================

CREATE DATABASE IF NOT EXISTS portfolio_mottner
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE portfolio_mottner;

-- ---------- Projets ----------
CREATE TABLE IF NOT EXISTS projets (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    titre        VARCHAR(150) NOT NULL,
    icon         VARCHAR(10)  DEFAULT NULL,
    categorie    VARCHAR(50)  NOT NULL,
    description  TEXT         NOT NULL,
    tags         VARCHAR(255) DEFAULT NULL,    -- ex: "PHP,MySQL,HTML"
    features     TEXT         DEFAULT NULL,    -- ex: une feature par ligne
    ordre        INT          DEFAULT 0,
    cree_le      DATETIME     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------- Contacts (formulaire) ----------
CREATE TABLE IF NOT EXISTS contacts (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nom       VARCHAR(100) NOT NULL,
    email     VARCHAR(150) NOT NULL,
    message   TEXT         NOT NULL,
    cree_le   DATETIME     DEFAULT CURRENT_TIMESTAMP,
    ip        VARCHAR(45)  DEFAULT NULL
) ENGINE=InnoDB;

-- ---------- Articles de veille ----------
CREATE TABLE IF NOT EXISTS veille (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    titre     VARCHAR(200) NOT NULL,
    theme     VARCHAR(100) DEFAULT NULL,
    resume    TEXT,
    source    VARCHAR(255) DEFAULT NULL,
    publie_le DATE         DEFAULT NULL,
    cree_le   DATETIME     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------- Certifications ----------
CREATE TABLE IF NOT EXISTS certifications (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    titre       VARCHAR(150) NOT NULL,
    organisme   VARCHAR(100) NOT NULL,
    date_obt    VARCHAR(20)  DEFAULT NULL,
    description TEXT,
    icon        VARCHAR(10)  DEFAULT NULL
) ENGINE=InnoDB;
