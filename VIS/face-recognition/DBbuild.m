dbSad = buildImagesDB( 'training_images\', 'subject' , '_sad.jpg', 10, 'name10.txt', 80, 60);
dbHappy = buildImagesDB( 'training_images\', 'subject' , '_happy.jpg', 10, 'name10.txt', 80, 60);
dbNormal = buildImagesDB( 'training_images\', 'subject' , '_normal.jpg', 10, 'name10.txt', 80, 60);

trainDB = [dbHappy, dbNormal, dbSad];
trainModel = buildFacesModel(trainDB, 0.85);

dbSleepy = buildImagesDB('testing_images\', 'subject', '_sleepy.jpg', 10, 'name10.txt', 80, 60);
dbSurprised = buildImagesDB('testing_images\', 'subject', '_surprised.jpg', 10, 'name10.txt', 80, 60);

testDB = [dbSleepy, dbSurprised];
labelledDB = recognizeFacesKnn(testDB, trainModel, 5);
plotDBImagesWithLabels(labelledDB,'grayResize', 5, 'Testing');


%dbSad = buildImagesDB( 'training_images\', 'subject' , '_sad.jpg', 10, 'name10.txt'. 80, 60);
% %dbSleepy = buildImagesDB('testing_images\', 'subject', '_sleepy.jpg', 10, 'name10.txt');
% labelledDB = recognizeFacesKnn(dbSleepy, trainModel, 3);
% plotDBImagesWithLabels(labelledDB,'grayResize', 5, 'Testing Sleepy');
% %plotEigenfaces(eigfaces, meanFace);
% 
% %disp('Press Enter to continue ...');
% %pause
% 
% dbSurprised = buildImagesDB('testing_images\', 'subject', '_surprised.jpg', 10, 'name10.txt');
% labelledDB = recognizeFacesKnn(dbSurprised, trainModel, 3);
% plotDBImagesWithLabels(labelledDB,'grayResize', 5, 'Testing Surprised');

% [eigfaces, lambda, meanFace] = computeEigenfaces(trainDB);
% plotEigenfaces(eigfaces(:, 1:10));

