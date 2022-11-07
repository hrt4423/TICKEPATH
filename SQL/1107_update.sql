/*
    更新日：11/7
    ・命名のゆれを修正
    ・bookingテーブルに'is_cancel'列を追加（予約のキャンセル状況を表す, boolean型）
    ・seatテーブルの列'is_vacant'(INT型)を'is_reserved'(boolean型)に変更
    ・historyテーブルにbrowse_dateを追加（閲覧日時, DATETIME型）
    ・booking, booking_detailテーブルにデータを追加
*/
START TRANSACTION;

ALTER TABLE booking ADD COLUMN is_cancel INT;

ALTER TABLE booking_detail 
CHANGE visitor_First_Name visitor_first_name VARCHAR(128) NOT NULL;

ALTER TABLE seat CHANGE is_vacant is_reserved BOOLEAN DEFAULT false;

ALTER TABLE booking MODIFY is_cancel BOOLEAN DEFAULT false;

ALTER TABLE history ADD COLUMN browse_date DATETIME;

INSERT INTO booking(booking_date, client_id)
VALUES('2021-10-30', 1),
('2021-10-30', 2),
('2021-10-30', 3),

('2019-02-10', 1),
('2019-02-10', 2),
('2019-02-10', 3);

INSERT INTO booking_detail(
    booking_id,
    visitor_family_name,
    visitor_first_name,
    seat_id
)VALUES
(1, '平山', '武', 1),
(2, '前野', '武美', 2),
(3, '志度', '朝日', 3),

(4, '平山', '武', 4),
(5,'前野', '武美', 5),
(6, '志度', '朝日', 6);

COMMIT;
