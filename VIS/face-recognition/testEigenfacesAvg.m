dbCenterLight = buildImagesDB('training_images\', 'subject', 'centerlight.gif', 10, 'names.txt');
dbGlasses = buildImagesDB('training_images\', 'subject', 'glasses.gif', 10, 'names.txt');
dbNoGlasses = buildImagesDB('training_images\', 'subject', 'noglasses.gif', 10, 'names.txt');
dbHappy = buildImagesDB('training_images\', 'subject', 'happy.gif', 10, 'names.txt');
dbNormal = buildImagesDB('training_images\', 'subject', 'normal.gif', 10, 'names.txt');
dbSad = buildImagesDB('training_images\', 'subject', 'sad.gif', 10, 'names.txt');

trainDB = [dbCenterLight, dbGlasses, dbNoGlasses, dbHappy, dbNormal, dbSad];
trainModel = buildFacesModel(trainDB, 0.9);
noTrainPersons =10;
noConditions = 6;

dbSleepy = buildImagesDB('testing_images\', 'subject', 'sleepy.gif', 10, 'names.txt');
labelledDB = recognizeFacesAvg(dbSleepy, trainModel, noTrainPersons, noConditions);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Sleepy');
disp('Press Enter to continue ...');
pause

dbSurprised = buildImagesDB('testing_images\', 'subject', 'surprised.gif', 10, 'names.txt');
labelledDB = recognizeFacesAvg(dbSurprised, trainModel, noTrainPersons, noConditions);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Surprised');
disp('Press Enter to continue ...');
pause

dbWink = buildImagesDB('testing_images\', 'subject', 'wink.gif', 10, 'names.txt');
labelledDB = recognizeFacesAvg(dbWink, trainModel, noTrainPersons, noConditions);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Wink');