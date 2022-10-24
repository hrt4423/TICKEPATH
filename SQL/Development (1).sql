CREATE TABLE SeatValue //席種テーブル
(SeatValueID           INTEGER     NOT NULL,
 SeatName              VARCHAR(128)    NOT NULL,
 PRIMARY KEY(SeatValueID));


CREATE TABLE Artist //アーティストテーブル
(ArtistID               INTEGER     NOT NULL,
ArtistName              VARCHAR(128)    NOT NULL,
PRIMARY KEY(ArtistID));

CREATE TABLE Performance //公演テーブル
(PerformanceID         INTEGER     NOT NULL,
PerformanceName        VARCHAR(128)    NOT NULL,    //公演名
ArtistName             VARCHAR(128)    NOT NULL,
Place                  VARCHAR(128)    NOT NULL,
PerformanceDate        Date            NOT NULL,    //公演日
StartTime              DATE            NOT NULL,
EndTime                DATE            NOT NULL,
PRIMARY KEY(PerformanceID));

CREATE TABLE Client //顧客テーブル
(ClientID              INTEGER     NOT NULL,
FamilyName             VARCHAR(128)    NOT NULL,
FirstName              VARCHAR(128)    NOT NULL,
Gender                 VARCHAR(5)      NOT NULL,
Mail                   VARCHAR(128)    NOT NULL,
Phonenumber            CHAR(10)        NOT NULL,
Ken                    VARCHAR(128)    NOT NULL,
City                   VARCHAR(128)    NOT NULL,
Homeaddress            VARCHAR(128)    NOT NULL,  //番地
Roomnumber             VARCHAR(128)    ,   //マンション名、部屋番号
PRIMARY KEY(ClientID));

CREATE TABLE Booking //予約テーブル
(BookingID             INTEGER     NOT NULL,
BookingDate            DATE        NOT NULL,
ClientID              INTEGER     NOT NULL,
PRIMARY KEY(BookingID),
FOREIGN KEY fkey1(ClientID)REFERENCES Client(ClientID));

CREATE TABLE Favorite //お気に入りテーブル
(ClientID              INTEGER     NOT NULL,
ArtistID               INTEGER     NOT NULL,
FOREIGN KEY fkey2(ClientID)REFERENCES Client(ClientID),
FOREIGN KEY fkey3(ArtistID)REFERENCES Artist(ArtistID),
PRIMARY KEY(ClientID,ArtistID));

CREATE TABLE History //閲覧履歴テーブル
(ClientID              INTEGER     NOT NULL,
PerformanceID         INTEGER     NOT NULL,
FOREIGN KEY fkey4(ClientID)REFERENCES Client(ClientID),
FOREIGN KEY fkey5(PerformanceID)REFERENCES Performance(PerformanceID),
PRIMARY KEY(ClientID,PerformanceID));

CREATE TABLE Seat //席テーブル
(SeatID               INTEGER     NOT NULL,
PerformanceID         INTEGER     NOT NULL,
SeatValueID           INTEGER     NOT NULL, 
SeatPrice             VARCHAR(128)NOT NULL,
VacantSeat            INTEGER     NOT NULL,/空席         
FOREIGN KEY fkey6(PerformanceID)REFERENCES Performance(PerformanceID),
FOREIGN KEY fkey7(SeatValueID)REFERENCES SeatValue(SeatValueID),
PRIMARY KEY (SeatID,PerformanceID));

CREATE TABLE BookingDetail //予約詳細テーブル
(BookingDetailID       INTEGER         NOT NULL,
VisitorFamilyName      VARCHAR(128)    NOT NULL,
VisitorFirstName       VARCHAR(128)    NOT NULL,
BookingID             INTEGER     NOT NULL,
SeatID                INTEGER          NOT NULL,
FOREIGN KEY fkey8(BookingID)REFERENCES Booking(BookingID),
FOREIGN KEY fkey9(SeatID)REFERENCES Seat(SeatID),
PRIMARY KEY(BookingDetailID,BookingID));








