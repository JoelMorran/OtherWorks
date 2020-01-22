dbSad = buildImagesDB( 'training_images\', 'subject' , '_sad.jpg', 10, 'name10.txt', 80, 60);
dbHappy = buildImagesDB( 'training_images\', 'subject' , '_happy.jpg', 10, 'name10.txt', 80, 60);
dbNormal = buildImagesDB( 'training_images\', 'subject' , '_normal.jpg', 10, 'name10.txt', 80, 60);

trainDB = [dbHappy, dbNormal, dbSad];
trainModel = buildFacesModel(trainDB, 0.85);

dbSleepy = buildImagesDB('testing_images\', 'subject', '_sleepy.jpg', 10, 'name10.txt', 80, 60);
dbSurprised = buildImagesDB('testing_images\', 'subject', '_surprised.jpg', 10, 'name10.txt', 80, 60);

testDB = [dbSleepy, dbSurprised];

%Note that you need to change the KNN value of K = 1, 3 or 5 below
%
labelledDB = recognizeFacesKnn(testDB, trainModel, 5);
plotDBImagesWithLabels(labelledDB,'grayResize', 5, 'Testing');


%To use this peace of code you need to change the image size in the  
% plotEigenfaces function to 80 x 60
% 
[eigfaces, lambda, meanFace] = computeEigenfaces(trainDB);
plotEigenfaces(eigfaces(:, 1:10));

% Not used for size 80 x 60
% 
% [labelledDB,n] = recognizeFacesKnn(testDB, trainModel, 5);
% IdxMe = n([5,15],:);
% plotDBImages(trainDB( [IdxMe(1,:), IdxMe(2,:)]), 'grayResize', 5, 'My closest faces');
%plotDBImages(trainDB( ), 'grayResize', 5, 'My closest faces');

