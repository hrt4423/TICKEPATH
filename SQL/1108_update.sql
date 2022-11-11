/*
    アーティストテーブル、お気に入りテーブルにデータを追加
*/

START TRANSACTION;
INSERT INTO artist(artist_name)VALUES('あいみょん'),('米津玄師');
INSERT INTO favorite(client_id, artist_id)VALUES(1, 1),(2, 2), (3, 1), (3, 2);

ALTER TABLE performance ADD COLUMN artist_id INTEGER NOT NULL;

UPDATE performance SET artist_id = 1 WHERE artist_name = 'あいみょん';
UPDATE performance SET artist_id = 2 WHERE artist_name = '米津玄師';

COMMIT;