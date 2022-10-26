CREATE TABLE SeatValue //席種テーブル
(Seat_Value_ID           INTEGER     NOT NULL,
 Seat_Name              VARCHAR(128)    NOT NULL,
 PRIMARY KEY(SeatValue_ID));


CREATE TABLE Artist //アーティストテーブル
(Artist_ID               INTEGER     NOT NULL,
Artist_Name              VARCHAR(128)    NOT NULL,
PRIMARY KEY(Artist_ID));

CREATE TABLE Performance //公演テーブル
(Performance_ID         INTEGER     NOT NULL,
Performance_Name        VARCHAR(128)    NOT NULL,    //公演名
Artist_Name             VARCHAR(128)    NOT NULL,
Place                  VARCHAR(128)    NOT NULL,
Performance_Date        Date            NOT NULL,    //公演日
Start_Time              DATE            NOT NULL,
End_Time                DATE            NOT NULL,
PRIMARY KEY(Performance_ID));

CREATE TABLE Client //顧客テーブル
(Client_ID              INTEGER     NOT NULL,
Family_Name             VARCHAR(128)    NOT NULL,
First_Name              VARCHAR(128)    NOT NULL,
Gender                 VARCHAR(5)      NOT NULL,
Mail                   VARCHAR(128)    NOT NULL,
Phonenumber            CHAR(10)        NOT NULL,
Ken                    VARCHAR(128)    NOT NULL,
City                   VARCHAR(128)    NOT NULL,
Homeaddress            VARCHAR(128)    NOT NULL,  //番地
Roomnumber             VARCHAR(128)    ,   //マンション名、部屋番号
PRIMARY KEY(Client_ID));

CREATE TABLE Booking //予約テーブル
(Booking_ID             INTEGER     NOT NULL,
Booking_Date            DATE        NOT NULL,
Client_ID              INTEGER     NOT NULL,
PRIMARY KEY(Booking_ID),
FOREIGN KEY fkey1(Client_ID)REFERENCES Client(Client_ID));

CREATE TABLE Favorite //お気に入りテーブル
(Client_ID              INTEGER     NOT NULL,
Artist_ID               INTEGER     NOT NULL,
FOREIGN KEY fkey2(Client_ID)REFERENCES Client(Client_ID),
FOREIGN KEY fkey3(Artist_ID)REFERENCES Artist(Artist_ID),
PRIMARY KEY(Client_ID,Artist_ID));

CREATE TABLE History //閲覧履歴テーブル
(Client_ID              INTEGER     NOT NULL,
Performance_ID         INTEGER     NOT NULL,
FOREIGN KEY fkey4(Client_ID)REFERENCES Client(Client_ID),
FOREIGN KEY fkey5(Performance_ID)REFERENCES Performance(Performance_ID),
PRIMARY KEY(Client_ID,Performance_ID));

CREATE TABLE Seat //席テーブル
(Seat_ID               INTEGER     NOT NULL,
Performance_ID         INTEGER     NOT NULL,
Seat_Value_ID           INTEGER     NOT NULL, 
Seat_Price             VARCHAR(128)NOT NULL,
Vacant_Seat            INTEGER     NOT NULL,/空席         
FOREIGN KEY fkey6(Performance_ID)REFERENCES Performance(Performance_ID),
FOREIGN KEY fkey7(Seat_Value_ID)REFERENCES SeatValue(Seat_Value_ID),
PRIMARY KEY (Seat_ID,Performance_ID));

CREATE TABLE BookingDetail //予約詳細テーブル
(Booking_Detail_ID       INTEGER         NOT NULL,
Visitor_Family_Name      VARCHAR(128)    NOT NULL,
Visitor_First_Name       VARCHAR(128)    NOT NULL,
Booking_ID             INTEGER     NOT NULL,
Seat_ID                INTEGER          NOT NULL,
FOREIGN KEY fkey8(Booking_ID)REFERENCES Booking(Booking_ID),
FOREIGN KEY fkey9(Seat_ID)REFERENCES Seat(Seat_ID),
PRIMARY KEY(Booking_Detail_ID,Booking_ID));








