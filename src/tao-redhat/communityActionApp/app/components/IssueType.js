var React = require('react-native');
var Impact = require('./Impact');

var {
    Image,
    TouchableHighlight,
    Text,
    StyleSheet,
    View
} = React;

class IssueType extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            report: ''
        };
    }
    handleSubmit(event){
      this.setState({
        report: {
          issuetype: 'fight'
        }
      });
      this.props.navigator.push({
        title: 'Severity',
        component: Impact,
        passProps: {report: this.state.report}
      });
      this.setState({
        report: ''
      });
    }
    render(){
        var layout = (
        <View style={styles.container}>
            <View style={styles.logoContainer}>
              <Image style={styles.logo}
                source={require('../assets/logo.png')}
              />
            </View>
            <View style={styles.issueContainer}>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'aid'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Aid
                </Text>
              </TouchableHighlight>
             <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'meetgreet'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                 Meet{'\n'}&{'\n'}Greet
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'walkout'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Walk Out
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'vagrancy'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Vagrancy
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'vandalism'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Vandalism
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'unlock'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Unlock
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'securitycheck'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Security Check
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'disturbance'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Disturb
                </Text>
              </TouchableHighlight>
              <TouchableHighlight
                underlayColor={'#B1B8B9'}
                style={styles.issueButton}
                value={'graffiti'}
                onPress={this.handleSubmit.bind(this)}>
                <Text style={styles.issueType}>
                  Graffiti
                </Text>
              </TouchableHighlight>
            </View>
        </View>
        );
        return layout;
    }
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingTop: 120,
  },
  issueContainer: {
    flex: 1,
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    alignItems: 'center',
    paddingLeft: 24,
    paddingRight: 24
  },
  issueButton: {
    width: 100,
    height: 100,
    justifyContent: 'center',
    backgroundColor: '#f62745',
    padding: 16,
    borderWidth: 1,
    borderColor: '#ffffff'
  },
  issueType: {
    color: '#ffffff',
    textAlign: 'center',
    fontSize: 11,
    fontWeight: 'bold'
  },
  logo: {
    width: 150,
    height: 150,
    backgroundColor: '#f62745',
    resizeMode: 'stretch'
  },
  logoContainer: {
    alignItems: 'center',
    paddingBottom: 40
  }
});


module.exports = IssueType;