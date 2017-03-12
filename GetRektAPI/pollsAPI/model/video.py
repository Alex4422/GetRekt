'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models

class video(models.Model):
    '''
    classdocs
    '''
    
    titre = models.CharField(max_length=200)
    #lien = 
    #image = model_pic = models.ImageField(upload_to = 'pic_folder/', default = 'pic_folder/None/no-img.jpg')
    dateDeCreation = models.DateTimeField('date de creation de la video')
    description = models.CharField(max_length=200)

    def __str__(self):
        return self.titre + self.image + self.dateDeCreation + self.description