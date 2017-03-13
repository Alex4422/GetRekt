'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
import datetime
from .user import *
from .video import *

class commentaire(models.Model):
    '''
    classdocs
    '''

    message = models.CharField(max_length=200)
    dateDeCreation = models.DateTimeField('date de creation du commentaire')

    #foreign key
    user=models.ForeignKey(user)
    video=models.ForeignKey(video)
    
    
    def __str__(self):
        return self.message
        