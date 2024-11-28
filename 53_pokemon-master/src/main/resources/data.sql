-- タイプデータを挿入
INSERT INTO types (type_id, type_name_kana, type_name_kanji) VALUES
(1, 'ほのお', '炎'),
(2, 'みず', '水'),
(3, 'くさ', '草'),
(4, 'でんき', '電'),
(5, 'とう', '闘'),
(6, 'ちょう', '超'),
(7, 'はがね', '鋼');

-- 技データを挿入
INSERT INTO moves (name, power) VALUES
('かえんほうしゃ', 90), -- ほのお
('みずでっぽう', 40),   -- みず
('つるのムチ', 45),     -- くさ
('10まんボルト', 90),   -- でんき
('いわおとし', 50),     -- いわ
('かぜおこし', 40);     -- ひこう

-- ポケモンデータを挿入
INSERT INTO pokemon (name, hp, attack, type_id, move_id) VALUES
('ヒトカゲ', 39, 52, 1, 1), -- ほのお, かえんほうしゃ
('ゼニガメ', 44, 48, 2, 2), -- みず, みずでっぽう
('フシギダネ', 45, 49, 3, 3), -- くさ, つるのムチ
('ピカチュウ', 35, 55, 4, 4), -- でんき, 10まんボルト
('イシツブテ', 40, 80, 5, 5), -- いわ, いわおとし
('ポッポ', 40, 45, 6, 6);     -- ひこう, かぜおこし

-- ユーザーデータを挿入
INSERT INTO users (email, trainer_name, trainer_icon, trainer_level) VALUES
('ash@pokemon.com', 'サトシ', 'icon1.png', 10),
('misty@pokemon.com', 'カスミ', 'icon2.png', 8),
('brock@pokemon.com', 'タケシ', 'icon3.png', 7);

-- ユーザーポケモンデータを挿入
INSERT INTO user_pokemon (user_id, pokemon_id, position) VALUES
(1, 1, 1), -- サトシ, ヒトカゲ
(1, 4, 2), -- サトシ, ピカチュウ
(1, 6, 3), -- サトシ, ポッポ
(2, 2, 1), -- カスミ, ゼニガメ
(2, 3, 2), -- カスミ, フシギダネ
(2, 6, 3), -- カスミ, ポッポ
(3, 5, 1), -- タケシ, イシツブテ
(3, 3, 2), -- タケシ, フシギダネ
(3, 6, 3); -- タケシ, ポッポ

-- ユーザーのパートナーポケモンを設定
UPDATE users SET partner_pokemon_id = 1 WHERE user_id = 1; -- サトシのパートナーはヒトカゲ
UPDATE users SET partner_pokemon_id = 4 WHERE user_id = 2; -- カスミのパートナーはゼニガメ
UPDATE users SET partner_pokemon_id = 5 WHERE user_id = 3; -- タケシのパートナーはイシツブテ

-- 対戦履歴データを挿入
INSERT INTO battles (user_id, opponent_id, result) VALUES
(1, 2, 'WIN'), -- サトシ vs カスミ
(2, 3, 'LOSE'), -- カスミ vs タケシ
(1, 3, 'WIN'); -- サトシ vs タケシ

-- 属性相性データを挿入
INSERT INTO type_effectiveness (type_from, type_to, effectiveness) VALUES
(1, 1, 1),
(1, 2, 1.2),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1.2),
(2, 4, 1),
(2, 5, 1.2),
(2, 6, 1),
(2, 7, 1),
(3, 1, 1.2),
(3, 2, 1),
(3, 3, 1),
(3, 4, 1),
(3, 5, 1),
(3, 6, 1),
(3, 7, 1.2),
(4, 1, 1),
(4, 2, 1.2),
(4, 3, 1),
(4, 4, 1),
(4, 5, 1),
(4, 6, 1),
(4, 7, 1),
(5, 1, 1),
(5, 2, 1),
(5, 3, 1),
(5, 4, 1.2),
(5, 5, 1),
(5, 6, 1),
(5, 7, 1.2),
(6, 1, 1),
(6, 2, 1),
(6, 3, 1),
(6, 4, 1),
(6, 5, 1.2),
(6, 6, 1.2),
(6, 7, 1),
(7, 1, 1),
(7, 2, 1),
(7, 3, 1),
(7, 4, 1),
(7, 5, 1),
(7, 6, 1),
(7, 7, 1);
