/*
    アーティストテーブル、お気に入りテーブルにデータを追加
*/

START TRANSACTION;
INSERT INTO artist(artist_name)VALUES('あいみょん'),('米津玄師');
INSERT INTO favorite(client_id, artist_id)VALUES(1, 1),(2, 2), (3, 1), (3, 2);
COMMIT;