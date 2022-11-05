/*
    更新日：11/7
    ・命名のゆれを修正
    ・bookingテーブルに'is_cancel'列を追加（予約のキャンセル状況を表す, boolean型）
    ・seatテーブルの列'is_vacant'(INT型)を'is_reserved'(boolean型)に変更
    ・historyテーブルにbrowse_dateを追加（閲覧日時, DATETIME型）
*/
START TRANSACTION;

ALTER TABLE booking ADD COLUMN is_cancel INT;

ALTER TABLE booking_detail 
CHANGE visitor_First_Name visitor_first_name VARCHAR(128) NOT NULL;

ALTER TABLE seat CHANGE is_vacant is_reserved BOOLEAN DEFAULT false;

ALTER TABLE booking MODIFY is_cancel BOOLEAN DEFAULT false;

ALTER TABLE history ADD COLUMN browse_date DATETIME;

COMMIT;
