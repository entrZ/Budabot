DROP TABLE IF EXISTS leprocs;
CREATE TABLE leprocs ( profession varchar(20) NOT NULL, name varchar(50) NOT NULL, itemid INT NOT NULL, research_name VARCHAR(50), research_lvl INT NOT NULL, proc_type CHAR(6), chance VARCHAR(20), modifiers VARCHAR(255) NOT NULL, duration varchar(20) NOT NULL, description VARCHAR(255) NOT NULL);
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Inflation Adjustment', 263437, 'Process Theory', 1, 'Type 2', '5%', 'User Modify Nano attack damage modifier 50', '7s', 'In combat you will occasionally cause extra damage. Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Papercut', 263449, 'Market Awareness', 1, 'Type 2', '5%', 'Attacker Hit Health Cold -10 .. -23', '', 'In combat you will occasionally root your opponent. Only one type 1 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Social Services', 263460, 'Hostile Negotiations', 5, 'Type 2', '5%', 'Target Restrict Action Movement', '8s', 'In combat you will occasionally root your opponent.  Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Lost Paperwork', 263444, 'Professional Development', 4, 'Type 1', '5%', 'Attacker Hit Health Melee -264 .. -532', '', 'In combat you will occasionally cause extra damage. Only one type 1 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Next Window Over', 263464, 'Professional Development', 3, 'Type 2', '5%', 'User Modify Nano delta 30', '60s', 'In combat you will occasionally receive a bonus to your natural nano bot renewal. Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Deflation', 263440, 'Executive Decisions', 3, 'Type 2', '5%', 'User Modify Nano attack damage modifier 100', '7s', 'In combat you will occasionally increase your ability to do nanobot damage. Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Wait In That Queue', 263428, 'Process Theory', 2, 'Type 1', '5%', 'Target Restrict Action Movement', '5s', 'In combat you will occasionally root your opponent. Only one type 1 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Bureaucrat', 'Forms in Triplicate', 263426, 'Human Resources', 6, 'Type 1', '10%', 'User Modify Nano delta 60', '60s', 'In combat when struck by an opponent you will occassionally receive a bonus to your natural nano bot renewal. This is a Type 1 action ');

INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Keeper', 'Righteous Strike', 266108, 'Wisdom', 1, 'Type 2', '5%', 'Self Modify Damage modifier 2', '60s', 'In combat you will occasionally increase your damage output. Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Keeper', 'Faithful Reconstruction', 266156, 'Virtue', 1, 'Type 2', '5%', 'Team Hit Health 21 .. 42', '', 'In combat you will occasionally heal your team, including yourself. Only one type 2 action can be selected at a time');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Keeper', 'Eschew the Faithless', 266147, 'Wisdom', 2, 'Type 1', '5%', 'User Modify Duck explosives 14 Dodge ranged 14 Evade close 50', '60s', 'In combat you will occasionally increase your evade skill. Only one type 1 action can be selected at a time');


INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Charring Blow', 0, 'Exploration', 5, 'Type 1', '', 'Attacker Hit Health Fire -533 .. -1434', '', 'Occasionally when you hit an opponent you will cause an extra hit of 533 - 1434 fire damage.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Aesir Absorption', 0, 'Exploration', 7, 'Type 1', '', 'User Modify Add All Def. 50', '30s', 'Occasionally when struck by an opponent you will increase your AAD by 50 points for 30 seconds.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Flaming Hit', 0, 'Game Warden', 1, 'Type 2', '', 'Attacker Hit Health Fire -12 .. -22', '', 'Occasionally when you hit an opponent you will cause an extra hit of 12 - 22 fire damage.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Skin Protection', 0, 'Gunslinger', 2, 'Type 1', '', 'User Modify ShieldAC 31, User Modify AbsorbAC 150', '?', 'Occasionally when struck by an opponent you will raise a 31 point damage shield and a 150 point absorb shield. ');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Machete Flurry', 0, 'Keen Eyes', 7, 'Type 1', '', 'User Modify +Damage 60', '60s', 'Occasionally when you hit an opponent you will increase your damage by 60 points for 1 minute.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Healing Herbs', 0, 'Keen Eyes', 10, 'Type 2', '', 'User Hit Health 697 .. 1193', '', 'Occasionally when you hit an opponent you will heal yourself for 697 - 1193 points.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Durable Bandages', 0, 'Safari Guide', 5, 'Type 2', '', 'Team Hit Health 261 .. 595', '', 'Occasionally when you hit an opponent you will heal yourself and your team for 261 - 595 points.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Basic Dressing', 0, 'Wilderness Lore', 1, 'Type 1', '', 'User Hit Health 15 .. 25', '', 'Occasionally when you hit an opponent you will heal yourself for 15 - 25 points.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Soothing Herbs', 0, 'Wilderness Lore', 2, 'Type 1', '', 'User Hit Health 186 .. 391', '', 'Occasionally when you hit an opponent you will heal yourself for 186 - 391 points.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Machete Slice', 0, 'Wilderness Survival', 3, 'Type 1', '', 'Attacker Hit Health Fire -137 .. -350', '', 'Occasionally when you hit an opponent you will cause an extra hit of 137 - 350 fire damage.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Restore Vigor', 0, 'Wilderness Survival', 4, 'Type 2', '', 'Team Hit Health 356 .. 746', '', 'Occasionally when you hit an opponent you will heal yourself and your team for 356 - 746 points.');
INSERT INTO leprocs (profession, name, itemid, research_name, research_lvl, proc_type, chance, modifiers, duration, description) VALUES ('Adventurer', 'Combustion', 0, 'Wilderness Survival', 10, 'Type 2', '', 'Attacker Hit Health Fire -1294 .. -2415', '', 'Occasionally when you hit an opponent you will cause an extra hit of 1294 - 2415 fire damage.');
