'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
import datetime
from .User import *
from .Video import *

class Commentaire(models.Model):
    '''
    classdocs
    '''

    message = models.CharField(max_length=200)
    dateDeCreation = models.DateTimeField('date de creation du commentaire')

    #foreign key
    user=models.ForeignKey(User)
    video=models.ForeignKey(Video)
    
    
    def __str__(self):
        return self.message
        