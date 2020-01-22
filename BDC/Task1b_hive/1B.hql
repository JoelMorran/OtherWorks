DROP TABLE myinput;
DROP TABLE res;

CREATE TABLE myinput (age INT, job STRING, marital STRING, education STRING, default STRING, balance INT, housing STRING, loan INT, contact STRING, day INT, month STRING, duration INT, campaign INT, pdays INT, previous INT, poutcome STRING, termdeposit STRING) ROW FORMAT DELIMITED FIELDS TERMINATED BY '\;';

-- Load the text from the local filesystem
LOAD DATA LOCAL INPATH '../bank-full.csv'
	INTO TABLE myinput;
 
-- Create a table
CREATE TABLE res AS
SELECT education, ROUND(AVG(balance))
FROM myinput
GROUP BY education;

-- Dump the output to file
INSERT OVERWRITE LOCAL DIRECTORY './output/'
ROW FORMAT DELIMITED
	FIELDS TERMINATED BY '\t'
STORED AS TEXTFILE
	SELECT * FROM res;
