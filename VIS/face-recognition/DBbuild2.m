dbSad = buildImagesDB( 'training_images\', 'subject' , '_sad.jpg', 10, 'name10.txt');
dbHappy = buildImagesDB( 'training_images\', 'subject' , '_happy.jpg', 10, 'name10.txt');
dbNormal = buildImagesDB( 'training_images\', 'subject' , '_normal.jpg', 10, 'name10.txt');

trainDB = [dbHappy, dbNormal, dbSad];
trainModel = buildFacesModel(trainDB, 0.95);
plotEigenfaces(eigfaces, meanFace);

dbSleepy = buildImagesDB('testing_images\', 'subject', 'sleepy.gif', 10, 'names.txt');
labelledDB = recognizeFacesKnn(dbSleepy, trainModel, 5);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Sleepy');
disp('Press Enter to continue ...');
pause
dbSurprised = buildImagesDB('testing_images\', 'subject', 'surprised.gif', 10, 'names.txt');
labelledDB = recognizeFacesKnn(dbSurprised, trainModel, 5);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Surprised');
disp('Press Enter to continue ...');
pause
dbWink = buildImagesDB('testing_images\', 'subject', 'wink.gif', 10, 'names.txt');
labelledDB = recognizeFacesKnn(dbWink, trainModel, 5);
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Testing Wink');