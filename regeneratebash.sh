#!/bin/bash
#chmod u+x regeneratebash.sh 
#sudo ./regeneratebash.sh
#made editable the folder Mapper/src/Entities
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:convert-mapping --namespace="Mapper\\Entity\\" --force  --from-database annotation ./module/Mapper/src/
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Mapper/src/ --generate-annotations=true
