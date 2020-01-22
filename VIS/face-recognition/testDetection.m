% Building training Model
dbCenterLight = buildImagesDB('training_images\', 'subject', 'centerlight.gif', 10, 'names.txt');
dbGlasses = buildImagesDB('training_images\', 'subject', 'glasses.gif', 10, 'names.txt' );
dbNoGlasses = buildImagesDB('training_images\', 'subject', 'noglasses.gif', 10, 'names.txt' );
dbHappy = buildImagesDB('training_images\', 'subject', 'happy.gif', 10, 'names.txt' );
dbNormal = buildImagesDB('training_images\', 'subject', 'normal.gif', 10, 'names.txt' );
dbSad = buildImagesDB('training_images\', 'subject', 'sad.gif', 10, 'names.txt' );
dbSleepy = buildImagesDB('testing_images\', 'subject', 'sleepy.gif', 10, 'names.txt' );
dbSurprised = buildImagesDB('testing_images\', 'subject', 'surprised.gif', 10, 'names.txt' );
dbWink = buildImagesDB('testing_images\', 'subject', 'wink.gif', 10, 'names.txt' );

trainDB = [dbCenterLight, dbGlasses, dbNoGlasses, dbHappy, dbNormal, ...
    dbSad, dbSleepy, dbSurprised, dbWink];
trainModel = buildFacesModel(trainDB, 0.9);
clear dbCenterLight dbGlasses dbNoGlasses dbHappy dbNormal ...
    dbSad dbSleepy dbSurprised dbWink
disp(['A Train Model of ',num2str(length(trainDB)) , ' faces has been created.'])
disp('Press Enter to continue to testing ...');
pause

% Load testing images for face detection and run face detection
testDB = buildImagesDB('detection_images\', 'image', 'jpg', 25, 'names.txt' );
plotDBImages(testDB, 'rgb', 5, 'Original Testing Images');
disp('Testing images have been loaded.')
disp('Press Enter to continue to detection ...');
pause
labelledDB = detectFaces(testDB, trainModel, 0.2); % 1.2, 0.2, 0.3, 0.4
plotDBImagesWithLabels(labelledDB,'grayCrop', 5, 'Labelled Testing Images');
noFaces = 0;
for i=1:length(labelledDB)    
   if (isempty(strfind(labelledDB(i).label, 'Not')))
      noFaces = noFaces + 1; 
   end
end
disp([num2str(noFaces) , ' faces have been detected in the ', ... 
    num2str(length(labelledDB)), ' input images.'])