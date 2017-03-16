'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
from datetime import datetime
from .User import *
from .Video import *

class Vote(models.Model):
    '''
    classdocs
    '''

    dateDeCreation = models.DateTimeField('date de creation du vote')
    
    #foreign key
    user = models.ForeignKey(User)
    video = models.ForeignKey(Video)
    
    def __str__(self):
        return str(self.dateDeCreation)
        