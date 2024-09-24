import random as rdm

def random_bdd(): 

##region

    region = ['Auvergne-Rhone-Alpes', 'Bourgogne-Franche-Comte', 'Bretagne', 'Centre-Val de Loire', 'Corse', 'Grand Est', 'Hauts-de-France', 'Ile-de-France', 'Normandie', 'Nouvelle-Aquitaine', 'Occitanie', 'Pays de la Loire', 'Provence-Alpes-Cote d\'Azur' ]

    fichier = open("Region.txt", "w")

    fichier.write("{};{}\n".format("ID_region", "Nom_region"))

    for i in range(1, len(region)+1):

        fichier.write("{};{}\n".format(i, region[i-1]))
        
    fichier.close()

##ville

    ville = ['Lyon', 'Annecy', 'Chambery', 'Bourg-En-Bresse', 'Dijon', 'Auxerre', 'Macon', 'Nevers', 'Rennes', 'Saint-Malo', 'Brest', 'Quimper', 'Orleans', 'Tours', 'Bourges', 'Chartres', 'Ajaccio', 'Bastia', 'Corte', 'Calvi', 'Strasbourd', 'Reims', 'Metz', 'Nancy', 'Lille', 'Amiens', 'Calais', 'Dunkerque', 'Paris', 'Courbevoie', 'Montreil', 'Saint-Denis', 'Rouen', 'Caen', 'Le Havre', 'Cherbourg', 'Bordeaux', 'La Rochelle', 'Limoges', 'Bayonne', 'Toulouse', 'Albi', 'Montpellier', 'Lez', 'Nantes', 'Angers', 'Le Mans', 'Saumur', 'Marseille', 'Aix-De-Provence', 'Nice', 'Avignon']

    codepostal = ['69000', '74000', '73000', '01000', '21000', '89000', '71000', '58000', '35000', '35400', '29200', '29000', '45000', '37000', '18000', '28000', '20000', '20200', '20250', '20260', '67000', '51100', '57000', '54000', '59000', '80000', '62100', '59140', '75000', '92400', '93100', '93200', '76000', '14000', '76600', '14000', '33000', '17000', '87000', '64100', '31000', '81000', '34000', '34980', '44000', '49000', '72000', '49400', '13000', '13100', '06000', '84000']

    id_region = [] 

    for i in range(1, 14):
        id_region += [i] * 4 

    fichier = open("Ville.txt", "w")

    fichier.write("{};{};{};{}\n".format("ID_ville", "Nom_ville", "Code_postal", "ID_region"))

    for i in range(1, len(ville)+1):

       fichier.write("{};{};{};{}\n".format(i, ville[i-1], codepostal[i-1], id_region[i-1]))

    fichier.close()

##agence

    id_ville = []
    capteur = 0
    capteur_bis = []

    for i in range(1, 104):
        id_ville += [i] * 2 

    fichier = open("Agence.txt", "w")

    fichier.write("{};{};{}\n".format("ID_agence", "Nom_agence", "ID_ville"))

    for i in range(1, 104+1):
         
        nbr_capteur = rdm.randint(1, 3)
        capteur = capteur + nbr_capteur
        capteur_bis += [nbr_capteur] 

        fichier.write("{};{}{};{}\n".format(i, 'Agence', i , id_ville[i-1]))

    fichier.close()

##poste 

    type_poste = ['Chef', 'Administrateur', 'Technicien']

    fichier = open("Poste.txt", "w")

    fichier.write("{};{}\n".format("ID_poste", "Nom_poste"))

    for i in range(1, 3+1):

        fichier.write("{};{}\n".format(i, type_poste[i-1]))

    fichier.close()

##gaz

    nom_gaz = ['CO2', 'CH4', 'N2O', 'HFC', 'PFC', 'SF6', 'SO2', 'NOx', 'NH3', 'CO', 'COVNM']
    type_gaz = ['GES', 'GES', 'GES', 'GES', 'GES', 'GES', 'GRA', 'GRA', 'GRA', 'GRA', 'GRA']

    fichier = open("Gaz.txt", "w")

    fichier.write("{};{};{}\n".format("ID_gaz", "Nom_gaz", "Type_gaz"))

    for i in range(1, len(nom_gaz)+1):
            
            fichier.write("{};{};{}\n".format(i, nom_gaz[i-1], type_gaz[i-1]))

    fichier.close()

##secteur

    type_secteur = ['Industriel', 'Agriculture', 'Transport', 'Residentiel', 'Tertiaire']

    fichier = open("Secteur.txt", "w")

    fichier.write("{};{}\n".format("ID_secteur", "Type_secteur"))

    for i in range(1, len(type_secteur)+1):
         
        fichier.write("{};{}\n".format(i, type_secteur[i-1]))

    fichier.close()


##capteur

    print(capteur_bis)

    fichier = open("Capteur.txt", "w")

    fichier.write("{};{}\n".format("ID_capteur", "Nom_capteur"))

    for i in range(1, capteur+1):
            
            fichier.write("{};{}{}\n".format(i, 'Capteur', i))

    fichier.close()

##agent

    id_poste = ['1', '2', '3']
    rapport = 0
    ii = 0
    
    ID_agence = []
    rapport_bis = []

    for i in range(1, 104+1):
         
        ID_agence += [i] * 3

    fichier = open("Agent.txt", "w")

    fichier.write("{};{};{};{};{};{};{};{};{};{};{}\n".format("ID_agent", "Nom_agent", "Prenom_agent", "Telephone_agent","Email_agent","Adressepostal_agent","Salaire","Date_poste", "ID_ville", "ID_poste", "ID_agence"))
    
    agent_admin = []
    agent_tech = []

    for i in range(1, 312+1):
        
        chiffre1 = rdm.randint(0,99)
        chiffre2 = rdm.randint(0,99)
        chiffre3 = rdm.randint(0,99)
        chiffre4 = rdm.randint(0,99)
        
        if chiffre1 < 10:
            chiffre1 = "0{}".format(chiffre1)
            
        if chiffre2 < 10:
            chiffre2 = "0{}".format(chiffre2)
            
        if chiffre3 < 10:
            chiffre3 = "0{}".format(chiffre3)
            
        if chiffre4 < 10:
            chiffre4 = "0{}".format(chiffre4)
            
        numero_tel = "06{}{}{}{}".format(chiffre1,chiffre2,chiffre3,chiffre4)
        adrpostal = "{} rue numero{}".format(rdm.randint(0,99),rdm.randint(0,99))
        
        chiffre5 = rdm.randint(1,12)
        chiffre6 = rdm.randint(1,28)
        
        if chiffre5 < 10:
            chiffre5 = "0{}".format(chiffre5)
            
        if chiffre6 < 10:
            chiffre6 = "0{}".format(chiffre6)
        
        date_prise_poste = "{}-{}-{}".format(rdm.randint(1990,2022),chiffre5,chiffre6)

        Nbr_rapport = rdm.randint(1, 20)
        

        if id_poste[i % 3-1] == '1':
            fichier.write("{};{};{};{};{};{};{};{};{};{};{}\n".format(i, 'Nom{}'.format(i), 'Prenom{}'.format(i),numero_tel,"prenom{}.nom{}@data-x.com".format(i,i),adrpostal,rdm.randint(2500,6000),date_prise_poste, rdm.randint(1, 52), id_poste[i % 3-1], ID_agence[i-1]))
                    
        elif id_poste[i % 3-1] == '2':
            rapport = rapport + Nbr_rapport
            rapport_bis += [Nbr_rapport]

            agent_admin.append(i)
            fichier.write("{};{};{};{};{};{};{};{};{};{};{}\n".format(i, 'Nom{}'.format(i), 'Prenom{}'.format(i),numero_tel,"prenom{}.nom{}@data-x.com".format(i,i),adrpostal,rdm.randint(2500,6000),date_prise_poste, rdm.randint(1, 52), id_poste[i % 3-1], ID_agence[i-1]))

        elif id_poste[i % 3-1] == '3':
            agent_tech.append(i)
            fichier.write("{};{};{};{};{};{};{};{};{};{};{}\n".format(i, 'Nom{}'.format(i), 'Prenom{}'.format(i),numero_tel,"prenom{}.nom{}@data-x.com".format(i,i),adrpostal,rdm.randint(2500,6000),date_prise_poste, rdm.randint(1, 52), id_poste[i % 3-1], ID_agence[i-1]))
            ii += 1

    fichier.close()

##rapport

    fichier = open("Rapport.txt", "w")

    fichier.write("{};{};{}\n".format("ID_rapport", "Date_donnees", "ID_secteur"))

    for i in range(1, rapport+1):

        jours =rdm.randint(1,27)
        mois = rdm.randint(1,12)

        if jours < 10 :
            jours = "0{}".format(jours)

        if mois < 10 :
            mois = "0{}".format(mois)

        Date_donnees = "{}-{}-{}".format(rdm.randint(2015, 2020), mois, jours)

        fichier.write("{};{};{}\n".format(i, Date_donnees, rdm.randint(1, 5)))

    fichier.close()

##gerer

    fichier = open("Gerer.txt", "w")

    fichier.write("{};{};{}\n".format("ID_capteur", "ID_agent", "Date_capteur"))

    agent_tech_bis = []

    for i in range(len(agent_tech)):

        for j in range(capteur_bis[i]):
            agent_tech_bis.append(agent_tech[i])

    for i in range(1, capteur+1):

        jours =rdm.randint(1,27)
        mois = rdm.randint(1,12)

        if jours < 10 :
            jours = "0{}".format(jours)

        if mois < 10 :
            mois = "0{}".format(mois)

        Date_capteur = "{}-{}-{}".format(rdm.randint(2010, 2019), mois, jours)

        fichier.write("{};{};{}\n".format(i, agent_tech_bis[i-1], Date_capteur))

    fichier.close()

##rediger

    fichier = open("Rediger.txt", "w")

    fichier.write("{};{};{}\n".format("ID_agent", "ID_rapport", "Date_rapport"))   

    agent_admin_bis = []

    for i in range(len(agent_admin)):

        for j in range(rapport_bis[i]):
            agent_admin_bis.append(agent_admin[i])


    for i in range(1, rapport+1):

        jours =rdm.randint(1,27)
        mois = rdm.randint(1,12)

        if jours < 10 :
            jours = "0{}".format(jours)

        if mois < 10 :
            mois = "0{}".format(mois)

        Date_rapport = "{}-{}-{}".format(rdm.randint(2015, 2020), mois, jours)

        fichier.write("{};{};{}\n".format(agent_admin_bis[i-1], i, Date_rapport))  

    fichier.close()

##rapport_gaz

    fichier = open("Rapport_gaz.txt", "w")

    fichier.write("{};{};{};{}\n".format("ID_rapport", "ID_gaz", "ID_capteur", "Emissions_ppm"))

    for i in range(1, rapport+1):

        fichier.write("{};{};{};{}\n".format(i, rdm.randint(1, 11), rdm.randint(1, capteur) , rdm.random() + rdm.randint(1, 1000)))

    fichier.close()
        

random_bdd()