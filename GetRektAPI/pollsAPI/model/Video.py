'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
from .User import *
from .Categorie import *

class Video(models.Model):
    '''
    classdocs
    '''
    
    titre = models.CharField(max_length=200)
    lien = models.CharField(max_length=400, default='')
    image = models.CharField(max_length=200, default='')
    dateDeCreation = models.DateTimeField('date de creation de la video')
    description = models.TextField()

    #foreign key
    user = models.ForeignKey(User)
    categorie = models.ForeignKey(Categorie)
    
    
    
    def __str__(self):
        #return self.titre + self.image + self.dateDeCreation + self.description
        return self.titre