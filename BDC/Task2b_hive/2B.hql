DROP TABLE myinput;
DROP TABLE res;

CREATE TABLE myinput (tokenType STRING, month INT, count1 INT, hashTagName STRING) ROW FORMAT DELIMITED FIELDS TERMINATED BY '\t';


-- Load the text from the local filesystem
LOAD DATA LOCAL INPATH '../1millionTweets.tsv'
	INTO TABLE myinput;

CREATE TABLE res AS
SELECT hashTagName, SUM(count1) AS count1
FROM myinput
GROUP BY hashTagName
Order By count1 desc
LIMIT 1;

-- Dump the output to file
INSERT OVERWRITE LOCAL DIRECTORY './output/'
ROW FORMAT DELIMITED
	FIELDS TERMINATED BY '\t'
STORED AS TEXTFILE
	SELECT * FROM res;
