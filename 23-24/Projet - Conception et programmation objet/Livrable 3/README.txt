Pour pouvoir faire fonctionner ce program il faudra créer les tables assignées.



 CREATE TABLE [dbo].[article] (
    [ref]       INT             NOT NULL,
    [nom]       NVARCHAR (255)  NULL,
    [qt]        INT             NULL,
    [nature]    NVARCHAR (255)  NULL,
    [prixHT]    FLOAT (53)      NULL,
    [rea]       FLOAT (53)      NULL,
    [tauxTVA]   FLOAT (53)      NULL,
    [variation] FLOAT (53)      NULL,
    [lienImage] NVARCHAR (1000) NULL,
    PRIMARY KEY CLUSTERED ([ref] ASC)
);


CREATE TABLE [dbo].[client] (
    [Id]       INT           IDENTITY (1, 1) NOT NULL,
    [nom]      NCHAR (80)    NULL,
    [prenom]   NCHAR (80)    NULL,
    [mail]     VARCHAR (MAX) NULL,
    [mdp]      NCHAR (80)    NULL,
    [tel]      NCHAR (80)    NULL,
    [adresseL] NCHAR (80)    NULL,
    [adresseF] NCHAR (80)    NULL,
    [ville]    NCHAR (40)    NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC)
);

