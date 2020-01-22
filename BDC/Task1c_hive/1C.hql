DROP TABLE myinput;
DROP TABLE finalCount;
DROP TABLE yesCount;
DROP TABLE totalCount;

CREATE TABLE myinput (
	age INT, 
	job STRING,
	marital STRING, 
	education STRING,
	default STRING, 
	balance INT, 
	housing STRING, 
	loan STRING,
	contact STRING,
	day INT, 
    month STRING,
    duration INT, 
    campaign INT,
    pdays INT, 
    previous INT,
    poutcome STRING,
    termdeposit STRING
) ROW FORMAT DELIMITED FIELDS TERMINATED BY '\;';


-- Load the text from the local filesystem
LOAD DATA LOCAL INPATH '../bank-full.csv'
	INTO TABLE myinput;

CREATE TABLE yesCount AS
SELECT marital, count(*) AS count 
FROM myinput
WHERE loan LIKE "\"yes\""
GROUP BY marital;

CREATE TABLE totalCount AS
SELECT marital, count(*) AS count2
FROM myinput
GROUP BY marital;

CREATE TABLE finalCount AS
SELECT totalCount.marital, FLOOR(1000 * IF(yesCount.count IS NULL, 0, yesCount.count) / totalCount.count2 + 0.5)/10 AS percent
FROM yesCount RIGHT OUTER JOIN totalCount
ON (yesCount.marital = totalCount.marital);

-- Dump the output to file
INSERT OVERWRITE LOCAL DIRECTORY './output/'
ROW FORMAT DELIMITED
	FIELDS TERMINATED BY '\t'
STORED AS TEXTFILE
	SELECT * FROM finalCount;
