from rest_framework import serializers
from pollsAPI.models import Question
from pollsAPI.serializersAPI.ChoiceSerializer import ChoiceSerializer
from django.contrib.auth.models import User


class QuestionSerializer(serializers.ModelSerializer):
    owner = serializers.ReadOnlyField(source='owner.username')
    choices = ChoiceSerializer(many=True, read_only=True)#serializers.HyperlinkedRelatedField(many=True, view_name='choice-detail', read_only=True)
    class Meta:
        model = Question
        fields = ('url', 'id', 'owner', 'choices', 'question_text', 'pub_date', 'was_published_recently')
    

