'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
from .user import *
from .categorie import *

class video(models.Model):
    '''
    classdocs
    '''
    
    titre = models.CharField(max_length=200)
    lien = models.CharField(max_length=400, default='')
    image = models.CharField(max_length=200, default='')
    dateDeCreation = models.DateTimeField('date de creation de la video')
    description = models.CharField(max_length=200)

    #foreign key
    user = models.ForeignKey(user)
    categorie = models.ForeignKey(categorie)
    
    
    
    def __str__(self):
        #return self.titre + self.image + self.dateDeCreation + self.description
        return self.titre