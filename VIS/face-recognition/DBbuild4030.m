dbSad = buildImagesDB( 'training_images\', 'subject' , '_sad.jpg', 10, 'name10.txt', 40, 30);
dbHappy = buildImagesDB( 'training_images\', 'subject' , '_happy.jpg', 10, 'name10.txt', 40, 30);
dbNormal = buildImagesDB( 'training_images\', 'subject' , '_normal.jpg', 10, 'name10.txt', 40, 30);

trainDB = [dbHappy, dbNormal, dbSad];
trainModel = buildFacesModel(trainDB, 0.95);

dbSleepy = buildImagesDB('testing_images\', 'subject', '_sleepy.jpg', 10, 'name10.txt', 40, 30);
dbSurprised = buildImagesDB('testing_images\', 'subject', '_surprised.jpg', 10, 'name10.txt', 40, 30);

testDB = [dbSleepy, dbSurprised];

%Note that you need to change the KNN value of K = 1, 3 or 5 below
% 
labelledDB = recognizeFacesKnn(testDB, trainModel, 1);
plotDBImagesWithLabels(labelledDB,'grayResize', 5, 'Testing');

[labelledDB,n] = recognizeFacesKnn(testDB, trainModel, 5);
IdxMe = n([5,15],:);
plotDBImages(trainDB( [IdxMe(1,:), IdxMe(2,:)]), 'grayResize', 5, 'My closest faces');

%To use this peace of code you need to change the image size in the  
% plotEigenfaces function to 40 x 30
% 
% [eigfaces, lambda, meanFace] = computeEigenfaces(trainDB);
%  plotEigenfaces(eigfaces(:, 1:10));
 