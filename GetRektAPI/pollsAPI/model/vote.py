'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
from datetime import datetime
from .user import *
from .video import *

class vote(models.Model):
    '''
    classdocs
    '''

    dateDeCreation = models.DateTimeField('date de creation du vote')
    
    #foreign key
    user = models.ForeignKey(user)
    video = models.ForeignKey(video)
    
    def __str__(self):
        return str(self.dateDeCreation)
        